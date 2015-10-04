<?php namespace App\Presenters;

use App\Presenters\PublicacaoPresenter;

class NewsPresenter extends BasePresenter
{

    public function publicadoCompleto()
    {
        return $this->publicacao->user->name.' em '.$this->publicated_at->format("d M, Y");
    }

    public function linkSource()
    {
        return '<a href="'.$this->publicacao->url.'">'.$this->publicacao->source.'</a>';
    }

    public function link()
    {
        return route('blog.news', $this->publicacao->id);
    }

    public function getTitle()
    {
    	return $this->publicacao->title;
    }

     public function getSubContent($size = 100)
    {
        return substr($this->publicacao->content, 0, $size);
    }
}