  @extends('cd-admin.admin')
  @section('content')
  <section class="content-header">
    <h1>
Admin
    </h1>
    <ol class="breadcrumb">
    <li><i class="fa fa-dashboard"></i><a href="{{url('/dashboard')}}">Dashboard</a><b>-></b><a href="{{url('/viewadmin')}}">Admin</a><b>

    </ol>
  <!-- <div class="col-md-1"></div> -->
  <div class="col-sm-12">
  <div class="box">
              <div class="box-header text text-center">
                <h3 class="box-title" >View Admin</h3>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($admin as $a)
                  <tr>
                    <td>{{$a->id}}</td>
                    <td>{{$a->name}}
                    </td>
                    <td align="center">{{$a->email}}</td>
                    
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Admin Name</th>
                    <th>Admin Email</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
   </div>
   <div class="col-md-1"></div>

  </section>
           <style type="text/css">
           	.btnupdate
           	{
           		padding-right: 15px;
           		margin-right: 15px;
           	}

           </style>
  @endsection