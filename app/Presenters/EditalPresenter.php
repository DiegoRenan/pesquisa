<?php namespace App\Presenters;

use App\Presenters\PublicacaoPresenter;

class EditalPresenter extends PublicacaoPresenter
{

    public function startedAt()
    {
        return $this->started_at->format('d M, Y');
    }

    public function finishedAt()
    {
        return $this->finished_at->format('d M, Y');
    }
}