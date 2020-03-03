import React from 'react';

export default function WorkDetail(props) {
	return (
		<section classNameName='work'>
			<div className='container'>
				<div className='row'>
					<h1>Título genérico aquí</h1>
				</div>
				<div className='row'>
					<div className='col-12 col-md-8'>
						<div
							id='carousel'
							className='carousel slide m-auto'
							data-ride='carousel'>
							<ol className='carousel-indicators'>
								<li
									data-target='#carousel'
									data-slide-to='0'
									className='active'></li>
								<li data-target='#carousel' data-slide-to='1'></li>
								<li data-target='#carousel' data-slide-to='2'></li>
							</ol>
							<div className='carousel-inner'>
								<div className='carousel-item active'>
									<img
										className='d-block w-100'
										src='https://via.placeholder.com/300x100'
										alt='First slide'
									/>
								</div>
								<div className='carousel-item'>
									<img
										className='d-block w-100'
										src='https://via.placeholder.com/300x100'
										alt='Second slide'
									/>
								</div>
								<div className='carousel-item'>
									<img
										className='d-block w-100'
										src='https://via.placeholder.com/300x100'
										alt='Third slide'
									/>
								</div>
							</div>
							<a
								className='carousel-control-prev'
								href='#carousel'
								role='button'
								data-slide='prev'>
								<span
									className='carousel-control-prev-icon'
									aria-hidden='true'></span>
								<span className='sr-only'>Previous</span>
							</a>
							<a
								className='carousel-control-next'
								href='#carousel'
								role='button'
								data-slide='next'>
								<span
									className='carousel-control-next-icon'
									aria-hidden='true'></span>
								<span className='sr-only'>Next</span>
							</a>
						</div>
						<div className='row'>
							<div className='rating' id='rating'></div>
						</div>
						<div className='row mt-2'>
							<img
								src='../../public/assets/img/avatar-placeholder.png'
								style='height: 50px;'
							/>
							<h6 className='ml-2 my-auto'>Nombre genérico</h6>
						</div>
						<div className='row mt-4'>
							<h6>Work info</h6>
							<hr />
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting
								industry. Lorem Ipsum has been the industry's standard dummy
								text ever since the 1500s, when an unknown printer took a galley
								of type and scrambled it to make a type specimen book. It has
								survived not only five centuries, but also the leap into
								electronic typesetting, remaining essentially unchanged. It was
								popularised in the 1960s with the release of Letraset sheets
								containing Lorem Ipsum passages, and more recently with desktop
								publishing software like Aldus PageMaker including versions of
								Lorem Ipsum.
							</p>
						</div>
						<div className='row mt-4'>
							<div className='container-fluid'>
								<h6>User info</h6>
								<hr />
								<div className='row mt-2'>
									<img
										src='../../public/assets/img/avatar-placeholder.png'
										style='height: 40px;'
									/>
									<h6 className='ml-2 my-auto'>Nombre genérico</h6>
								</div>
								<div className='row'>
									<div className='container-fluid mt-4'>
										<div className='col-4'>
											<h6>Description</h6>
											<hr />
										</div>
										<p>
											Lorem Ipsum is simply dummy text of the printing and
											typesetting industry. Lorem Ipsum has been the industry's
											standard dummy text ever since the 1500s, when an unknown
											printer took a galley of type and scrambled it to make a
											type specimen book. It has survived not only five
											centuries.
										</p>
									</div>
								</div>
								<div className='row'>
									<div className='container-fluid mt-4'>
										<div className='col-4'>
											<h6>Rating</h6>
											<hr />
										</div>
									</div>
									<div className='container-fluid mt-4'>
										<div className='col-4'>
											<h6>Comments</h6>
											<hr />
											<div className='container-fluid'>
												<div className='row mt-2'>
													<img
														src='../../public/assets/img/avatar-placeholder.png'
														style='height: 30px;'
													/>
													<h6 className='ml-2 my-auto'>Pepito grillo</h6>
												</div>
												<div className='row mt-2'>
													<p>Me gusta este hombre</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div className='col-12 col-md-4'>
						<div>
							<h6>Schedule</h6>
							<hr />
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting
								industry. Lorem Ipsum has been the industry's standard dummy
								text ever since the 1500s, when an unknown printer took a galley
								of type and scrambled it to make a type specimen book. It has
								survived not only five centuries.
							</p>
						</div>
						<div>
							<h6>Zone info</h6>
							<hr />
							<p>
								Lorem Ipsum is simply dummy text of the printing and typesetting
								industry. Lorem Ipsum has been the industry's standard dummy
								text ever since the 1500s, when an unknown printer took a galley
								of type and scrambled it to make a type specimen book. It has
								survived not only five centuries.
							</p>
						</div>
						<div>MAPA</div>
						<div className='text-center'>
							<a href='#' className='btn btn-large btn-primary'>
								Contactar
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	);
}
