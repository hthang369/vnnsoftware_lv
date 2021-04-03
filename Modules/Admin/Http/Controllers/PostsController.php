<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Modules\Admin\Entities\PostsModel;
use Modules\Admin\Forms\PostsForm;
use Modules\Admin\Grids\PostsGridInterface;
use Modules\Admin\Repositories\PostsCriteria;
use Modules\Admin\Repositories\PostsRepository;
use Modules\Admin\Responses\PostsResponse;
use Modules\Admin\Validators\PostsValidator;
use Modules\Core\Http\Controllers\CoreController;

class PostsController extends CoreController
{
    public function __construct(PostsRepository $repository, PostsValidator $validator, PostsResponse $response, PostsCriteria $criteria)
    {
        parent::__construct($repository, $validator, $response, $criteria);
        $this->setDefaultView('admin::posts');
        $this->setRouteName('posts');
        $this->setPathView([
            'create' => 'admin::posts.post_modal',
            'show' => 'admin::posts.post_modal'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        print_r($request->all());
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:students',
        //     'age' => 'required|integer',
        //     'code' => 'required|unique:students'
        // ]);

        // $student = Student::query()->create($request->all());

        // return new JsonResponse([
        //     'success' => true,
        //     'message' => 'New student has been created.'
        // ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // $student = Student::query()->findOrFail($id);

        // $modal = [
        //     'model' => class_basename(User::class),
        //     'route' => route('students.update', $student->id),
        //     'pjaxContainer' => $request->get('ref'),
        //     'method' => 'patch',
        //     'action' => 'update'
        // ];

        // return view('students.student_modal', compact('modal', 'student'))->render();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'email' => 'required|email|unique:students,id,' . $id,
        //     'age' => 'required|integer',
        //     'code' => 'required|unique:students,id,' . $id,
        // ]);

        // $status = Student::query()->findOrFail($id)->update($request->all());

        // if ($status) {
        //     return new JsonResponse([
        //         'success' => true,
        //         'message' => 'Update student successfully.'
        //     ]);
        // }

        // return new JsonResponse(['success' => false], 400);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // $status = Student::query()->findOrFail($id)->delete();

        // return new JsonResponse([
        //     'success' => $status,
        //     'message' => 'Delete student successfully.'
        // ]);
    }
}
