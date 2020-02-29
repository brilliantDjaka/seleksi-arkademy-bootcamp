<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>ArkaTable</title>
  </head>
  <body>
    
    <nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light">
        <img id="arka-logo" src="{{asset('img/arka_logo.png')}}" class="navbar-brand" alt="" >
        
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <form class="form-inline my-2 my-lg-0">
            <input  id="search-bar" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button id="search-button" class="btn btn-lg " type="button" data-toggle="modal" data-target="#addModal">Add</button>
          </form>
        </div>
      </nav>

      <br>
      <br>
      <br>
      <div class="container ">
        <div class="row">
          <div class="col-lg">
            <table id="table-data" class="table table-borderless">
                <thead id="table-head">
                  <tr>
                    <th height scope="col">No</th>
                    <th scope="col">Cashier</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                   
                 @foreach($data as $element)
                 <th scope="row">{{$count++}}</th>
                    <td>{{$element->cashier}}</td>
                    <td>{{$element->product}}</td>
                    <td>{{$element->category}}</td>
                    <td>{{$element->price}}</td>
                    <td><button class="edit-button" data-toggle="modal" data-id='{{$element->id}}' data-target="#editModal"><img  src="{{asset('/svg/edit.svg')}}" height="20" width="20" alt=""></button>
                        <a href='/delete/{{$element->id}}' class="edit-button "><img src="{{asset('/svg/delete.svg')}}" height="20" width="20" alt=""></a>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
          </div>
          
        </div>
      </div>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="waef" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-edit-body">
            
                LOADING ~~~~~~


            </div>
            <div class="modal-footer">
            
            <button form="edit-form" type="submit" class="btn btn-secondary" >Edit</button>
            
            </div>
        </div>
        </div>
    </div>


    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
                <form id="add-form" method='POST' action={{route("store")}}>
                    @csrf
                    <div class="form-group">
                        <select required name='kasir' class="form-control" id="exampleFormControlSelect1">
                          @foreach($kasir as $data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="form-group">
                      <select required name='category' class="form-control" id="exampleFormControlSelect1">
                      @foreach($category as $data)
                          <option value="{{$data->id}}">{{$data->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div  class="form-group">
                        <input required name='product' type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ice Tea">
                      </div>
                      <div  class="form-group">
                        <input required name='price' type="number" class="form-control" id="exampleFormControlInput1" placeholder="Rp. 100.000">
                      </div>
                  </form>


            </div>
            <div class="modal-footer">
            <button id='add-modal-button' type="submit" class="btn btn-secondary" form="add-form" >Add</button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal Notif -->
    <div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <h5>Dita Raisa Andriani ID <h5>#1</h5></h5>
                </div>
            <div class="d-flex justify-content-center">
                
                
                <img src="{{asset('/svg/check.svg')}}" height="200" width="200" alt="">
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <h5>Berhasil Dihapus</h5>
                </div>
            </div>
           
        </div>
        </div>
    </div>

   
   
  <script>
      $(document).ready(function(){
      $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget )
        var id = button.data('id') // Extract info from data-* attributes
        console.log(id)
         $('.modal-edit-body').load('{{url("/edit/")}}/'+id);
})
})
  </script>
  </body>
</html>