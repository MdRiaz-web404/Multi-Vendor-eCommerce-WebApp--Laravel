<div>
    {{-- Do your work, then step back. --}}
    <div class="card">
        <div class="card-body">
            <div>
                @if (session()->has('color_message'))
                    <div class="alert alert-success text-center">
                        {{ session('color_message') }}
                    </div>
                @endif
            </div>
            <form wire:submit.prevent="add_Color">
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Color </label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="text" wire:model="color" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Color Hex Code</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="color" wire:model="color_code" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0">
                    </div>
                    <!--end::Col-->
                </div>
                <div class="d-flex justify-content-end py-6 px-9">
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Add Color</button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                @if (session()->has('color_delete'))
                    <div class="alert alert-danger text-center">
                        {{ session('color_delete') }}
                    </div>
                @endif
                <table class="table table-striped
                table-hover
                table-borderless
                table-primary
                align-middle">
                    <thead class="table-light">
                        <tr>
                            <th colspan="2" >color </th>

                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($colors->where('vendor_id','=',auth()->id()) as $color)
                                <tr class="table-primary" >
                                    <td scope="row" colspan="2">
                                        <span>{{$color->color}}</span> <br> <br>
                                        <span class="p-2" style="background: {{$color->color_code}}">{{$color->color_code}}</span>
                                    </td>
                                    <td><button wire:click="delete('{{$color->id}}')" class="btn btn-danger">Delete</button></td>
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
