<div id="myModal" class="modal-block modal-header-color modal-block-primary mfp-hide">
	<section class="panel">
		<header class="panel-heading">
			<h2 class="panel-title">Form Pengguna</h2>
		</header>
		<div class="panel-body">
			<form action="{{ route('users.store') }}" enctype="multipart/form-data" files="true" method="post">
				@csrf
				@method('post')
				
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Hak Akses</label>
					<div class="col-sm-9">
						{{-- <input type="text" name="role_id" class="form-control" placeholder="Type your name..." required/> --}}
						<select class="form-control" name="user_id" id="user_id">
							@foreach ($users as $u => $user)
							<option value="{{ $user->id }}">{{ $user->name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-9">
						<input type="text" name="name" id="name" class="form-control" placeholder="Tulis Disini" required/>
					</div>
				</div>
				<div class="form-group mt-lg">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="email" class="form-control" placeholder="Tulis Disini" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
						<input type="password" name="password" id="password" class="form-control" placeholder="Tulis Disini" value="password" />
					</div>
				</div>
				{{-- <div class="form-group">
					<label class="col-sm-3 control-label">Comment</label>
					<div class="col-sm-9">
						<textarea rows="5" class="form-control" placeholder="Type your comment..." required></textarea>
					</div>
				</div> --}}
			
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button type="submit" class="btn btn-success modal-confirm" id="ajaxSubmit">Submit</button>
					<button class="btn btn-danger modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
		</form>
	</section>
</div>