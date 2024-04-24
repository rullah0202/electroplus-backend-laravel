@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <form method="post" action="{{ route('admin.update.password') }}"  >
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                    {{session('status')}}
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Old Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="current_password"   placeholder="Old Password" />

                                    @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"   placeholder="New Password" />

                                    @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Confirm New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" placeholder="Confirm New Password" /> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h5 class="mb-0">Delete Account</h6>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleDangerModal">Delete Account</button>
                                    										<!-- Modal -->
										<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true">
											<div class="modal-dialog modal-lg modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title ">Are you sure you want to delete your account?</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body " >
                                                        <form method="post" action="{{ route('admin.account.delete') }}"  >
                                                            @csrf
                                                            @if (session('status'))
                                                            <div class="alert alert-success" role="alert">
                                                                    {{session('status')}}
                                                            </div>
                                                            @elseif(session('error'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{session('error')}}
                                                            </div>
                                                            @endif
                                                            <div class="col-sm-10">
                                                                <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-sm-9 text-secondary">
                                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value=" "  placeholder="Current Password" />

                                                                    @error('password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete account</button>
                                                            </div>
                                                            </div>
                                                        </form>
													</div>
												</div>
											</div>
										</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection