<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="card">
        <div class="card-body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="add_Size">
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Size </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" wire:model="size" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    </div>
                    <!--end::Col-->
                </div>
                <div class="d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Add Size</button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                @if (session()->has('delete'))
                    <div class="alert alert-danger text-center">
                        {{ session('delete') }}
                    </div>
                @endif
                <table class="table table-striped
                table-hover
                table-borderless
                table-primary
                align-middle">
                    <thead class="table-light">
                        <tr>
                            <th colspan="2" >Size </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($sizes->where('vendor_id','=',auth()->id()) as $size)
                                <tr class="table-primary" >
                                    <td scope="row" colspan="2">{{$size->size_name}}</td>
                                    <td><button wire:click="delete('{{$size->id}}')" class="btn btn-danger">Delete</button></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-danger">No Data to Show</td>
                                </tr>
                            @endforelse

                        </tbody>
                        <tfoot>

                        </tfoot>
                </table>
            </div>

        </div>

    </div>
</div>
