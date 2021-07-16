<?php

namespace App\Transformers;

class RoleHasPermissionsTransformer
{
	protected $menuList = [
		['sectionCode' => 'company', 'text' => 'dashboard.dashboard'],
		['sectionCode' => 'bussiness-plan', 'text' => 'dashboard.timestamp.clock'],
		['sectionCode' => 'user-management', 'text' => 'dashboard.workingtime'],
		['sectionCode' => 'laka-user-management', 'text' => 'dashboard.leaveday'],
		['sectionCode' => 'role-management', 'text' => 'dashboard.overtime.index'],
		['sectionCode' => 'version', 'text' => 'timestamp-history.list.title'],
		['sectionCode' => 'version-deloy', 'text' => 'timestamp-history.list.title'],
		['sectionCode' => 'approval-api', 'text' => 'timestamp-history.list.title'],
	];
	protected $language = [
	];
	protected $languageLine;
    /**
     * @param array $data
     * @return array
     * @author nhat_truong
     * @since  2018-12-26
     */
    public function transformList(array $data)
    {
        $actions = config('permission.actions');
        $sectionAction = config('permission.section_action');
        $customSectionActions = config('permission.custom_section_action');

        foreach ($data as $key => $item) {
            $json = json_decode($item['permission']);

            foreach ($actions as $action) {
                $data[$key][$action] = (bool)$json->$action;
            }

            $available_actions = collect($sectionAction[$item['section_code']] ?? $actions);

            foreach ($customSectionActions as $section => $customActions) {
                if($data[$key]['section_code'] != $section) continue;

                foreach ($customActions as $action) {
                    list($actionKey,$sectionCode) = explode('_', $action);
					$idx_section = array_search($sectionCode, array_column($data,'section_code'));
					if(is_null($idx_section) || empty($idx_section)) continue;
                    $json = json_decode(array_get(array_get($data,$idx_section),'permission'));
                    $data[$key][$action] = (bool)$json->{$actionKey};
                    $available_actions->push($action);
                }
            }

            $data[$key]['available_actions'] = $available_actions->toArray();
        }

        $data = array_map(function($item) {
			$item['section_name'] = $this->translateSectionCode($this->menuList, $item['section_code']);
			return $item;
		},$data);

		$data = $this->filterData($data);

        return $data;
    }

	protected function filterData($results)
	{
		$results = array_values(array_filter($results,function($item){
            return count($item['available_actions']) > 0;
        }));

		$query = json_decode(request()->input('query'),true);

		foreach($query as $key => $value) {
			$key = str_replace('__like','',$key);
			$results = array_values(array_filter($results,function($item) use($key,$value){
				$section_name = strtolower($item[$key]);
				return (str_contains(strtolower(vn_to_str($section_name)),$value) || str_contains($section_name,$value));
			}));
		}

		return $results;
	}

	protected function translateSectionCode($menuList, $code, $parentText = '')
	{
		$translated = $this->translateLabel($code);
		if($translated)
			return ucfirst($translated);

		foreach($menuList as $item) {
			$label = ($parentText ? $parentText . ' > ' : '') . trans($item['text']);
			if(array_has($item,'childrens')) {
				$newParentText = $label;
				$translated = $this->translateSectionCode($item['childrens'], $code, $newParentText);
				if ($translated != $code)
					return ucfirst($translated);
			}

			if(!array_has($item,'sectionCode') || !array_has($item,'text'))
				continue;

			if($item['sectionCode'] != $code)
				continue;

			return ucfirst($label);
		}

		return $code;
	}

	protected function translateLabel($key)
	{
		if(array_has($this->language,$key)) {
			$keys = array_get($this->language,$key,[]);
			if(is_string($keys))
				$keys = [$keys];
			return implode(' ', array_map(function($item) {
				return trans($item);
			},$keys));
		}
		return false;
	}
}
