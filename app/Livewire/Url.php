<?php

namespace App\Livewire;

use App\Livewire\Actions\Urls\CreateUrlAction;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Url as UrlModel;
use Livewire\WithPagination;

class Url extends Component
{
    use WithPagination;
    public string $original_url;
    public ?int $url_id = null;
    public bool $show_edit_modal = false;


    protected array $rules = [
        'original_url' => 'required|url|unique:urls,original_url',
    ];

    protected array $messages = [
        'original_url.unique' => 'Url existe déjà',
    ];

    public function render(): View
    {
        $urls = UrlModel::query()->where('user_id', auth()->id())->paginate(3);
        return view('livewire.url', ['urls' => $urls]);
    }

    public function createUrl(): void
    {
        $this->validate();

        App::call(
            CreateUrlAction::class,[
                'originalUrl' => $this->original_url,
                'userId' => (int) auth()->id(),
            ]
        );

        session()->flash('message', 'URL créé avec succès!');
        $this->resetFields();
        $this->resetPage();
    }
    public function edit(int $id): void
    {
        $url = UrlModel::query()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $this->url_id = $url->id;
        $this->original_url = $url->original_url;
        $this->show_edit_modal = true;
    }
    public function updateUrl(): void
    {
        $this->validate();

        $url = UrlModel::query()
            ->where('user_id', auth()->id())
            ->findOrFail($this->url_id);

        $url->original_url = $this->original_url;
        $url->user_id = auth()->id();
        $url->save();

        $this->reset(['url_id', 'original_url', 'show_edit_modal']);

        session()->flash('message', 'URL mis à jour avec succès!');
        $this->resetPage();
    }

    public function deleteUrl(int $id): void
    {
        $url = UrlModel::query()
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $url->delete();

        session()->flash('message', 'URL supprimée avec succès!');
    }

    public function incrementClicks(): void
    {
        $this->resetPage();
    }
    private function resetFields(): void
    {
        $this->original_url = '';
        $this->url_id = null;
    }
}
