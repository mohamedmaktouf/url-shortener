<div>
    <div class="mb-4">
        <form wire:submit.prevent="{{'createUrl' }}">
            <div class="form-group">
                <label for="original_url">Lien original</label>
                <input type="url" id="original_url" wire:model="original_url" class="form-control" required>
            </div>
            @error('original_url') <span class="text-danger">{{ $message }}</span> @enderror

            <button type="submit" class="btn btn-primary mt-2">Ajouter un lien</button>
        </form>
    </div>

    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Url original</th>
                <th>Lien court</th>
                <th>Nb click </th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($urls as $url)
                <tr>
                    <td>{{ $url->original_url }}</td>
                    <td>{{ $url->shortened_url }}</td>
                    <td>{{ $url->clicks }}</td>
                    <td>
                        <button wire:click="edit({{ $url->id }})" class="btn btn-primary btn-sm">Modifier</button>
                        <button wire:click="deleteUrl({{ $url->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                        <a wire:click="incrementClicks()" href="{{ route('url.redirect', $url->shortened_url) }}"
                           target="_blank" class="btn btn-success btn-sm">Redirect</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Aucun Lien trouvé.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div>
            {{ $urls->links() }}
        </div>
    </div>

    <div>
        @if ($show_edit_modal)
            <div class="modal fade show d-block" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                 aria-hidden="true" style="background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Modifier</h5>
                            <button type="button" class="btn-close" wire:click="$set('showEditModal', false)"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="updateUrl">
                                <div class="mb-3">
                                    <label for="edit_original_url" class="form-label">Lien Original</label>
                                    <input type="url" id="edit_original_url" class="form-control"
                                           wire:model="original_url">
                                    @error('original_url') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            wire:click="$set('showEditModal', false)">Fermer</button>
                                    <button type="submit" class="btn btn-primary">Confirmer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

</div>
