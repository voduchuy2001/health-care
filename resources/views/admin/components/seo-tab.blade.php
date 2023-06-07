<div wire:ignore.self class="tab-pane" id="seo" role="tabpanel">
    <div class="d-flex">
        <div class="flex-grow-1 ms-2">
            <div class="row">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                            id="meta_title" wire:model="meta_title" placeholder="Meta Title">

                        @error('meta_title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror"
                            id="meta_keyword" wire:model="meta_keyword" placeholder="Meta Keyword">

                        @error('meta_keyword')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                        placeholder="Meta description" rows="7" wire:model="meta_description"></textarea>

                    @error('meta_description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>