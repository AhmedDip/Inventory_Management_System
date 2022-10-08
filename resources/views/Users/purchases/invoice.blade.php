@extends('Users.layoutInvoice')

@section('user_content')



<div class="card shadow mb-4">
    <div class="card-header py-3">
            <a class="btn btn-sm btn-primary shadow-sm float-right" href="{{ route('purchases.invoice.pdf', ['id' => $users->id,'invoice_id'=>$invoice->id])}}"><i
        class="fas fa-download fa-sm text-white-50"></i> Download As PDF</a>
        <h5 class="m-0 font-weight-bold text-primary">Purchase Invoice Details </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div><b>Supplier:</b>  {{$users->name}}</div>
                <div><b>Supplier Image: </b>
                    <br>
                  
                        <img class="img-fluid img-thumbnail" max-height=" 80px" width="100px"
                            src="{{ asset(Storage::url($users->image)) }}">

                
                </div>

            </div>

            <div class="col-md-6">
                <div><b>Date: </b>{{date('d-M-y', strtotime($invoice->date))}}</div>
                <div><b>Invoice Number: </b>{{$invoice->invoice_no}}</div>
                <div><b>Email:</b> {{$users->email}}</div>
                <div><b>Phone:</b> {{$users->phone}}</div>
                <div><b>Address:</b> {{$users->address}}</div>
                {{-- <div>
                    <img class="img-fluid img-thumbnail" height="100px" width="100px" id="prview"
                        src="{{ asset(Storage::url($invoice->items->products->image)) }}">


                </div> --}}
                
            </div>
    
            <div class="col-md-12  mt-4 table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

             
                        @foreach ($invoice->items as $item)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->product->title}}</td>
                            <td><img style="height: 60px; width: 80px;" class="center"
                                src="{{ asset(Storage::url($item->product->image)) }}"></td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->total}}</td>
                            <td>

                                <form action="{{route('user.purchase.delete_item',['id'=>$users->id, 'invoice_id'=>$invoice->id, 'item_id'=>$item->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    
                                    @if ($users->id!=1)

                                    <button onclick="return confirm('Are You Sure?')" type="submit"
                                    class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>

                                        
                                    @endif

                                 
                                </form>

                            </td>
                          </tr>
                            
                        @endforeach
                    
                      
                    </tbody>

                    <tfoot class="thead-light col-md-12">
                            <tr>
                                <th colspan="4" ><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#productexampleModal">Add Product</button>
                         

                               <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#paymentInvoiceexampleModal">Add Payment</button></th>

                              <th scope="col" class="text-right">Total =</th>
                              @php
                                  $total = $invoice->items()->sum('total')
                              @endphp
                              <th scope="col" colspan="2">
                                @if (!empty($item))

                                {{$total}} Taka


                                @elseif (empty($item))
                                {{0}}
                                    
                                @endif
                                
                            </th>
                             
                            </tr>

                            <tr>
                                <th colspan="4"></th>
                                <th scope="col" class="text-right">Paid =</th>
                              <th scope="col" colspan="2">
                                @php
                                  $amount = $invoice->payments()->sum('amount');
                           
                                @endphp
                              
                                @if (!empty($amount))

                                {{$amount}} Taka


                                @elseif (empty($amount))
                                {{0}}
                                    
                                @endif
                                
                            </th>

                            </tr>

                            <tr>
                                <th colspan="4"></th>
                                <th scope="col" class="text-right">Due =</th>
                              <th scope="col" colspan="2">
                                @php
                                  $amount = $invoice->payments()->sum('amount');
                           
                                @endphp
                              
                                @if (!empty($amount))

                                {{$total - $amount}} Taka


                                @elseif (empty($amount))
                                {{0}}
                                    
                                @endif
                                
                            </th>

                            </tr>

                    </tfoot>
                  </table>
            </div>
        </div>

        
    </div>

    
</div>


 

  
                                   

                                      


   <!-- Modal -->

      <!-- Modal -->
      <div class="modal fade" id="productexampleModal" tabindex="-1" role="dialog"
      aria-labelledby="productexampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="productexampleModalLabel">Add New product</h5>
              </div>
              <div class="modal-body">

                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <form action="{{ route('user.purchase.add_item', ['id'=> $users->id,'invoice_id'=> $invoice->id]) }}" method="post">
                                  {{ csrf_field() }}

                                  <div class="form-group row">
                                     <label for="products" class="col-sm-3 col-form-label">Product</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="product_id" id="products"  required>
                                        <option class="form-control" value=""  selected>Select An product</option>
                                        @foreach ( $products as $product)
                                        <option value="{{$product->id}}" required {{ old('product_id') == $product->id ? 'selected' : '' }}>{{$product->title}}</option>
                                        @endforeach                                                     
                                      </select>
                                    </div>
                                </div>
                                     
                                      </div>

                                      <label for="price" class="col-sm-3 col-form-label">Unit Price</label>
                                      <div class="col-sm-9">
                                          <input type="text" onkeyup="getTotal()" required name="price" value="{{ old('price') }}"
                                              class="form-control mb-2" id="price" placeholder="Enter the price">
                                      </div>


                                      <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                                      <div class="col-sm-9">
                                        <input type="number" onkeyup="getTotal()" required name="quantity" value="{{ old('quantity') }}"
                                        class="form-control mb-2" id="quantity" placeholder="Enter the quantity">
                       

                                      </div>


                                      <label for="total" class="col-sm-3 col-form-label">total</label>
                                      <div class="col-sm-9">
                                        <input type="number" onkeyup="getTotal()" required name="total" value="{{ old('total') }}"
                                        class="form-control mb-2" id="total" placeholder="Enter the total Amount">
                       

                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                              </form>
                          </div>

                  

                      </div>
                  </div>

              </div>

          </div>
      </div>
  </div>



   {{-- Modal For Adding New paymentInvoice --}}

    <!-- Modal -->
  <div class="modal fade" id="paymentInvoiceexampleModal" tabindex="-1" role="dialog"
        aria-labelledby="paymentInvoiceexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentInvoiceexampleModalLabel">New Payment For This Invoice</h5>
                </div>
                <div class="modal-body">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('user.payment.store', [$users->id, $invoice->id]) }}" method="post">
                                    {{ csrf_field() }}

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-3 col-form-label">Date</label>
                                        <div class="col-sm-9">
                                            <input type="date" required name="date" value="{{ old('date') }}"
                                                class="form-control mb-2" id="date" placeholder="Enter the date">

                                        </div>

                                        <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" required name="amount" value="{{ old('amount') }}"
                                                class="form-control mb-2" id="amount" placeholder="Enter the amount">
                                        </div>


                                        <label for="note" class="col-sm-3 col-form-label">Note</label>
                                        <div class="col-sm-9">
                                            <textarea name="note" required id="note" cols="25" rows="2" value="{{ old('note') }}"></textarea>

                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div> 

    <script type="text/javascript">

        function getTotal()
        {
         var price = document.getElementById('price').value;
         var quantity = document.getElementById('quantity').value;
     
         if (price && quantity)
         {
             total = price * quantity;
          document.getElementById('total').value = total;
            
         }
        }
     
     </script>


@endsection