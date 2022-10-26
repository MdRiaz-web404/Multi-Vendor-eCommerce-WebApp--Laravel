<div>
    @if ($session)
        <div class="alert alert-success text-center">
            {{ $session }}
        </div>
    @endif
        @if ($inventories)
            <div class="item_attribute">
                <div class="row">
                    <div class="col col-md-6">
                        @if ($inventories->size_id)
                            <div class="select_option clearfix">
                                <h4 class="input_title">Size *</h4>
                                    <select wire:model="size_dropdown" class="form-select">
                                        <option data-display="- Please select -" value="0">Choose Size</option>
                                            @foreach ($available_sizes as $size)
                                                <option value="{{$size->relationwithsize->id}}">{{$size->relationwithsize->size_name}}</option>
                                            @endforeach
                                    </select>
                            </div>
                        @endif
                    </div>
                    <div class="col col-md-6">
                        @if ($inventories->color_id)
                        <div class="select_option clearfix">
                            <h4 class="input_title">Color *</h4>
                            <select wire:model="color_dropdown" class="form-select">
                            @if ($available_colors)
                                <option data-display="- Please select -" value="0">Choose Color</option>
                                @foreach ($available_colors as $color)
                                    <option value="{{$color->id}}">{{$color->relationwithcolor->color}}</option>
                                @endforeach
                            @else
                                <option data-display="- Please select -" value="0">Choose Color First</option>
                            @endif
                            </select>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="quantity_wrap">
                <div>
                    <span>Quantity : </span>
                    <span class="p-2 mx-2 border" wire:click="decrement_quantity"><button class=""><i class="fal fa-minus"></i></button></span>
                    <input readonly class="p-2 text-center" style="width:15%" type="text" value="{{$quantity}}">
                    <span class="p-2 mx-2 border " wire:click="increment_quantity"><button class=""><i class="fal fa-plus"></i></button></span>
                </div>
                {{-- <div class="quantity_input">
                    <button type="button" class="input_number_decrement">
                        <i class="fal fa-minus"></i>
                    </button>
                    <input class="input_number" type="text" value="1">
                    <button type="button" class="input_number_increment">
                        <i class="fal fa-plus"></i>
                    </button>
                </div> --}}
                <div class="total_price ">Total: {{$unit_price}}</div>
            </div>

            <ul class="default_btns_group ul_li">
                @auth
                    @if ($inventories->size_id)
                        <li><button class="btn btn_primary addtocart_btn" wire:click='inventoryaddtocart'>Add To Cart</button></li>
                    @else
                        <li><button class="btn btn_primary addtocart_btn" wire:click='addtocart'>Add To Cart</button></li>
                    @endif
                @else
                    <li><a class="btn btn_primary addtocart_btn" id="not_logged_in">Add To Cart</a></li>
                @endauth
            </ul>
            </div>
        @else
            <div class="alert alert-danger">
                <span>This product's inventory is not added yet! </span>
            </div>
        @endif
</div>
