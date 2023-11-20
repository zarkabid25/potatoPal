<div class="row">
    @forelse($seedGenerations as $seedGeneration)
        <div class="col-md-4">
            <div class="user-boxes">
                <h5>{{ $seedGeneration->name }}</h5>
                <ul>
                    <li><a href="javascript:void(0);" data-id="{{ $seedGeneration->id }}" onclick="editSeedGeneration(this);" class="red-btn"> <span class="fa fa-edit"></span> Edit</a></li>
                    <li>
                        <form action="{{ route('seedGeneration.destroy', ['seedGeneration' => $seedGeneration->id]) }}" method="post">
                            @method('delete')
                            @csrf

                            <button type="submit" style="background-color: unset; border: none" class="trash-btn">
                                <span class="fa fa-trash-o"></span></button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    @empty
    @endforelse
    <!-- col -->
</div>
