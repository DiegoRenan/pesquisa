<?php namespace App\Presenters;

use App\Presenters\BasePresenter;

class PublicacaoPresenter extends BasePresenter
{

    /**
     * Return the name of user and date published (news) or created (others)
     * @return string
     */
    public function publicadoCompleto()
    {
        if($this->flag_tipo == 'NW')
            return $this->user->name.' em '.$this->news->publicated_at->format("d M, Y");
        else
            return $this->user->name.' em '.$this->createdAt();
    }

    /**
     * Return the content of publication
     * @param int $size
     * @return string
     */
    public function getContent($size = 100)
    {
        return substr($this->content, $size);
    }

    /**
     * Return a html symbol for each kind of publication
     * @return string
     */
    public function flagTipo()
    {
        if($this->flag_tipo == 'NW')
            return '<i class="glyphicon glyphicon-bullhorn"></i>';
        elseif($this->flag_tipo == 'ED')
            return '<i class="fa fa-file"></i>';
        elseif($this->flag_tipo == 'DC')
            return '<i class="fa fa-file-text"></i>';
        elseif($this->flag_tipo == 'EV')
            return '<i class="fa fa-calendar"></i>';
    }

    /**
     * Return a link for kind of publication
     * @return string
     */
    public function link()
    {
        if($this->flag_tipo == 'NW')
            return route('blog.news', $this->id);
        elseif($this->flag_tipo == 'ED')
            return route('blog.edital', $this->id);
        elseif($this->flag_tipo == 'DC')
            return route('blog.document', $this->id);
        elseif($this->flag_tipo == 'EV')
            return route('blog.event', $this->id);
    }
}