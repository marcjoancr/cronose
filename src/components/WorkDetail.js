import React from 'react';
import { Map, TileLayer, Marker, Popup } from 'react-leaflet';
import L from 'leaflet';
import Rater from 'react-rater';
import 'react-rater/lib/react-rater.css';

const position = [39.5616104, 3.20025];

const styles = {
	wrapper: {
		height: 200,
		width: '100%',
		margin: '0 auto',
		display: 'flex',
	},
	map: {
		flex: 1,
	},
};

const Moves = (props) => {
	return (
		<div style={styles.wrapper}>
			<Map style={styles.map} center={props.center} zoom={props.zoom}>
				<TileLayer url={props.url} />
				<Marker position={position}>
					<Popup>
						<b>Mi casa</b>
					</Popup>
				</Marker>
			</Map>
		</div>
	);
};

Moves.defaultProps = {
	center: [39.561627, 3.199883],
	zoom: 16,
	url: 'https://tiles.stadiamaps.com/tiles/outdoors/{z}/{x}/{y}{r}.png',
};

export default function WorkDetail(props) {
	return (
		<section className='work'>
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
							<div className='col-6'>
								<Rater total={5} rating={2} interactive={false} />
								<small className='muted ml-2 my-auto'>
									Personal Valoration
								</small>
							</div>
							<div className='col-6 text-right'>
								<small className='muted mr-2 my-auto'>Users Valoration</small>
								<Rater total={5} rating={4.5} interactive={false} />
							</div>
						</div>
						<div className='row mt-2'>
							<img src='/assets/img/avatar-placeholder.png' height='50px' />
							<h6 className='ml-2 my-auto'>Nombre Genérico</h6>
						</div>
						<div className='row mt-4'>
							<div className='container-fluid'>
								<h6>Work info</h6>
								<hr />
								<p>
									Lorem Ipsum is simply dummy text of the printing and
									typesetting industry. Lorem Ipsum has been the industry's
									standard dummy text ever since the 1500s, when an unknown
									printer took a galley of type and scrambled it to make a type
									specimen book. It has survived not only five centuries, but
									also the leap into electronic typesetting, remaining
									essentially unchanged. It was popularised in the 1960s with
									the release of Letraset sheets containing Lorem Ipsum
									passages, and more recently with desktop publishing software
									like Aldus PageMaker including versions of Lorem Ipsum.
								</p>
							</div>
						</div>
						<div className='row mt-4'>
							<div className='container-fluid'>
								<h6>User info</h6>
								<hr />
								<div className='row mt-2'>
									<img src='/assets/img/avatar-placeholder.png' height='40px' />
									<h6 className='ml-2 my-auto'>Nombre Genérico</h6>
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
										<div className='col-6 text-left'>
											<small className='muted mr-2 my-auto'>Puntuality</small>
											<Rater total={5} rating={4.5} interactive={false} />
										</div>
										<div className='col-6 text-left'>
											<small className='muted mr-2 my-auto'>
												Profesionality
											</small>
											<Rater total={5} rating={5} interactive={false} />
										</div>
										<div className='col-6 text-left'>
											<small className='muted mr-2 my-auto'>Sympathy</small>
											<Rater total={5} rating={1} interactive={false} />
										</div>
									</div>
									<div className='container-fluid mt-4'>
										<div className='mb-4'>
											<h6>Comments</h6>
											<div className='border-bottom col-4'></div>
											<div className='container-fluid'>
												<div className='row mt-2'>
													<img
														src='/assets/img/avatar-placeholder.png'
														height='30px'
													/>
													<h6 className='ml-2 my-auto'>Pepito grillo</h6>
												</div>
												<div className='row mt-2'>
													<div className='col-8'>
														<p>"Me gusta este hombre"</p>
													</div>
													<div className='col-4'>
														<div className='text-left my-auto'>
															<small className='muted mr-2'>
																Valoration Average
															</small>
															<Rater total={5} rating={4} interactive={false} />
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
					<div className='col-12 col-md-4'>
						<div className='m-3'>
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
						<div className='m-3'>
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
						<div>
							<Moves />
						</div>
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
