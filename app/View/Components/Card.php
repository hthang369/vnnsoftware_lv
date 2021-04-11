<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    /**
    * @var string
    */
    public $title;

    /**
    * @var string
    */
    public $header;

    /**
    * @var string
    */
    public $footer;

    /**
    * @var string
    */
    public $subTitle;

    /**
    * @var bool
    */
    public $noBody;

    /**
    * @var string
    */
    public $bodyTag;

    /**
    * @var string
    */
    public $bodyClass;

    /**
    * @var string
    */
    public $bodyTextVariant;

    /**
    * @var string
    */
    public $bodyBorderVariant;

    /**
    * @var string
    */
    public $titleTag;

    /**
    * @var string
    */
    public $subTitleTag;
    
    /**
    * @var string
    */
    public $subTitleTextVariant;

    /**
    * @var string
    */
    public $headerTag;

    /**
    * @var string
    */
    public $headerBgVariant;

    /**
    * @var string
    */
    public $headerBorderVariant;

    /**
    * @var string
    */
    public $headerTextVariant;

    /**
    * @var string
    */
    public $headerClass;

    /**
    * @var string
    */
    public $footerTag;

    /**
    * @var string
    */
    public $footerBgVariant;

    /**
    * @var string
    */
    public $footerBorderVariant;

    /**
    * @var string
    */
    public $footerTextVariant;

    /**
    * @var string
    */
    public $footerClass;

    /**
    * @var bool
    */
    public $imgTop;

    /**
    * @var bool
    */
    public $imgBottom;

    /**
    * @var string
    */
    public $imgSrc;

    /**
    * @var string
    */
    public $imgAlt;
    
    /**
    * @var string
    */
    public $imgHeight;
    
    /**
    * @var string
    */
    public $imgWidth;
    
    /**
    * @var string
    */
    public $tag;
    
    /**
    * @var string
    */
    public $textVariant;
    
    /**
    * @var string
    */
    public $bgVariant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $header = null, $footer = null
        , $subTitle = null, $noBody = false, $bodyTag = 'div'
        , $bodyTextVariant = null, $bodyClass = null
        , $bodyBorderVariant = null, $titleTag = 'h4', $subTitleTag = 'h6'
        , $subTitleTextVariant = null, $headerTag = 'div', $headerBgVariant = null
        , $headerBorderVariant = null, $headerTextVariant = null, $headerClass = null
        , $footerTag = 'div', $footerBgVariant = null, $footerBorderVariant = null
        , $footerTextVariant = null, $footerClass = null, $imgTop = false
        , $imgBottom = false, $imgSrc = null, $imgAlt = null
        , $imgHeight = null, $imgWidth = null, $tag = 'div'
        , $textVariant = null, $bgVariant = null)
    {
        $this->title = $title;
        $this->header = $header;
        $this->subTitle = $subTitle;
        $this->noBody = $noBody;
        $this->bodyTag = $bodyTag;
        $this->bodyTextVariant = $bodyTextVariant;
        $this->bodyClass = $bodyClass;
        $this->bodyBorderVariant = $bodyBorderVariant;
        $this->titleTag = $titleTag;
        $this->subTitleTag = $subTitleTag;
        $this->subTitleTextVariant = $subTitleTextVariant;
        $this->headerTag = $headerTag;
        $this->headerBgVariant = $headerBgVariant;
        $this->headerBorderVariant = $headerBorderVariant;
        $this->headerTextVariant = $headerTextVariant;
        $this->headerClass = $headerClass;
        $this->footerTag = $footerTag;
        $this->footerBgVariant = $footerBgVariant;
        $this->footerBorderVariant = $footerBorderVariant;
        $this->footerTextVariant = $footerTextVariant;
        $this->footerClass = $footerClass;
        $this->imgTop = $imgTop;
        $this->imgBottom = $imgBottom;
        $this->imgSrc = $imgSrc;
        $this->imgAlt = $imgAlt;
        $this->imgHeight = $imgHeight;
        $this->imgWidth = $imgWidth;
        $this->tag = $tag;
        $this->textVariant = $textVariant;
        $this->bgVariant = $bgVariant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
