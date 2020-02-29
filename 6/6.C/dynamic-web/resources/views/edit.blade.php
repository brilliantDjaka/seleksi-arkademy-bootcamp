
<div class='container'>
    <br>
<form id="edit-form" method='POST' action={{url("/edit/".$product->id)}}>
    
                    @csrf
                    <div class="form-group">
                        <select required name='kasir' class="form-control" id="exampleFormControlSelect1">
                          @foreach($kasir as $data)
                          <option
                          @if($data->id == $product->id_cashier)
                          selected @endif
                          value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                      <select required name='category' class="form-control" id="exampleFormControlSelect1">
                      @foreach($category as $data)
                          <option
                          @if($data->id == $product->id_category)
                          selected @endif
                          value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div  class="form-group">
                        <input required name='product' type="text" value='{{$product->name}}' class="form-control" id="exampleFormControlInput1" placeholder="Ice Tea">
                      </div>
                      <div   class="form-group">
                        <input required name='price' type="number" value='{{$product->price}}' class="form-control" id="exampleFormControlInput1" placeholder="Rp. 100.000">
                      </div>
                  </form>
</div>
