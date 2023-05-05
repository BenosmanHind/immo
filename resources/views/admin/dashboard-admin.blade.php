@extends('layouts.dashboard-admin')
@section('content')

<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row">
					<div class="col-xl-12 col-xxl-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">{{ $count_announcement }}</h5>
												<span class="text-success">Annonce(s)</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">{{ $feedback_option1 }}</h5>
												<span class="text-success">Propriété(s) vendu sur immo+</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">{{ $feedback_option2 }}</h5>
												<span class="text-success">Propriété(s) vendu ailleurs</span>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6 ">
								<div class="card overflow-hidden ">
									<div class="card-body  pt-4">
										<div class="row">
											<div class="col">
												<h5 class="mb-1">{{ $feedback_option3 }}</h5>
												<span class="text-success">Client(s) désisté</span>
											</div>
										</div>
									</div>

								</div>
							</div>
                            <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Les dernières inscriptions</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
														<th><strong>Nom complet</strong></th>
														<th><strong>Téléphone</strong></th>
														<th><strong>Email</strong></th>
														<th><strong>STATUS</strong></th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($registrations as $registration)
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td><b>{{ $registration->first_name }} {{ $registration->first_name }}</b></td>
														<td>{{ $registration->phone }}</td>
														<td>{{ $registration->email }}</td>
                                                        @if($registration->status == 0)
														<td class="recent-stats d-flex align-items-center"><span class="badge badge-warning">En attente</span></td>
                                                        @elseif($registration->status == 1)
                                                        <td class="recent-stats d-flex align-items-center"><span class="badge badge-success">Validé</span></td>
                                                        @else
                                                        <td class="recent-stats d-flex align-items-center"><span class="badge badge-danger">Annuler</span></td>
                                                        @endif
													</tr>
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Les dernières annonces</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
														<th><strong>Désignation</strong></th>
														<th><strong>Vendeur</strong></th>
														<th><strong>Catégorie</strong></th>
                                                        <th><strong>Type</strong></th>
														<th><strong>STATUS</strong></th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($announcements as $announcement)
													<tr>
														<td>
															<div class="custom-control custom-checkbox check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
																<label class="custom-control-label" for="customCheckBox2"></label>
															</div>
														</td>
														<td>{{ $announcement->designation }}</td>
                                                        <td>{{ $announcement->user->first_name }} {{ $announcement->user->last_name }}</td>
                                                        <td>{{ $announcement->category->designation }}</td>
                                                        @if($announcement->type == 0)
                                                        <td>Vente </td>
                                                        @else
                                                        <td>Location </td>
                                                        @endif
                                                        @if($announcement->status == 0)
                                                        <td id="td-status-{{$announcement->id}}"><span class="badge badge-warning">En attente</span></td>
                                                        @elseif($announcement->status == 1)
                                                        <td  id="td-status-{{$announcement->id}}"><span class="badge badge-success">Validé</span></td>
                                                        @elseif($announcement->status == 3)
                                                        <td  id="td-status-{{$announcement->id}}"><span class="badge badge-info">Supprimé</span></td>
                                                        @else
                                                        <td  id="td-status-{{$announcement->id}}"><span class="badge badge-danger">Annuler</span></td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Info annonces</h4>
									</div>
									<div class="card-body">
										<div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1" style="height:250px;">
											<ul class="timeline">
												<li>
													<div class="timeline-badge warning"></div>
													<a class="timeline-panel text-muted" href="#">

														<h6 class="mb-0"><strong class="text-warning">{{ $announcement_warning }}</strong> en attente(s)</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge success">
													</div>
													<a class="timeline-panel text-muted" href="#">
														<h6 class="mb-0"><strong class="text-success">{{ $announcement_validate }}</strong> validé(s)</h6>
													</a>
												</li>
												<li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">

														<h6 class="mb-0"><strong class="text-danger">{{ $announcement_cancel }}</strong> annulé(s)</h6>
													</a>
												</li>
                                                <li>
													<div class="timeline-badge danger">
													</div>
													<a class="timeline-panel text-muted" href="#">

														<h6 class="mb-0"><strong class="text-danger">{{ $announcement_delete }}</strong> supprimé(s)</h6>
													</a>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
                            <div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-header pb-0 border-0">
                                        <h4 class="card-title text-white">TOP CLIENTS</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="widget-media">
                                            <ul class="timeline">
                                                @foreach($top_customers as $top_customer)
                                                    <li>
                                                        <div class="timeline-panel">
                                                            <div class="media mr-2">
                                                                <img alt="image" width="50" src="{{asset('dashboard/images/avatar/1.jpg')}}">
                                                            </div>
                                                            <div class="media-body">
                                                                <h5 class="mb-1 text-white"> {{ $top_customer->user->first_name }} {{ $top_customer->user->last_name }}</h5>
                                                                <small class="d-block">{{ $top_customer->count }} annonce(s) </small>
                                                            </div>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>


                            </div>
                                </div>

						</div>
					</div>


						<!-- <div class="col-lg-12 col-sm-12">
                                <div class="card bg-primary">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="card-title">Dual Line Chart</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
									 <canvas id="lineChart_3Kk"></canvas>
                                </div>
                            </div> -->


					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
