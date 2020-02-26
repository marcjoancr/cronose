import React from 'react';
import { MdAddBox } from 'react-icons/md';

export default function Profile(props) {
	const data = props.data;

	return (
		<div className='profile'>
			<div className='img-back-profile'>
				<img src='/assets/img/img-profile.jpg' alt='' className=''></img>
			</div>
			<div id='head-profile'>
				<div className='row row-profile-name'>
					<div className='col-md-6 d-flex justify-content-md-start justify-content-center'>
						<div className='img-profile'>
							<img
								src='/assets/img/img-profile-person.png'
								alt='...'
								class=' rounded-circle shadow-sm'></img>
							<h5>
								<bold>NAME #TAG</bold>
							</h5>
						</div>
					</div>
					<div
						id='profile-average'
						className='col-md-6 mt-3 d-flex justify-content-end'>
						<p>RATE AVERAGE</p>
					</div>
				</div>
				<div className='d-flex justify-content-md-end justify-content-center'>
					<button className='btn pl-4 pr-4 mr-3'>Edit</button>
					<button className='btn pl-4 pr-4 '>Contact</button>
				</div>
			</div>
			<div id='body-profile'>
				<div class='card card-about'>
					<div class='card-header'>
						<h3>
							<b>ABOUT ME</b>
						</h3>
					</div>
					<div class='card-body'>
						<p class='card-text'>
							Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta
							liberavisse ea quo, te vel vidit mollis complectitur. Quis verear
							mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, nam
							postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus
							persecuti mediocritatem ei.
						</p>
						<p class='card-text'>
							Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta
							liberavisse ea quo, te vel vidit mollis complectitur. Quis verear
							mel ne. Munere vituperata vis cu, te pri duis timeam scaevola, nam
							postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus
							persecuti mediocritatem ei.
						</p>
					</div>
				</div>
				<div className='profile-offers'>
					<h3>
						<b>My Offers</b>
					</h3>
					<div class='card-deck text-center'>
						<div class='card'>
							<img
								class='card-img-top'
								src='/assets/img/img-work.jpg'
								alt='Card image cap'></img>
							<div class='card-body'>
								<div class='card-title'>
									<div className='d-flex justify-content-end'>
										<p>Rate Average</p>
									</div>
									<h4>
										<b>Offer Title</b>
									</h4>
									<p>Date</p>
								</div>
								<p class='card-text'>
									Some quick example text to build on the card title and make up
									the bulk of the card's content.
								</p>
								<a href='#' class='btn btn-block text-white'>
									See Offer
								</a>
							</div>
						</div>
						<div class='card'>
							<img
								class='card-img-top'
								src='/assets/img/img-work.jpg'
								alt='Card image cap'></img>
							<div class='card-body'>
								<div class='card-title'>
									<div className='d-flex justify-content-end'>
										<p>Rate Average</p>
									</div>
									<h4>
										<b>Offer Title</b>
									</h4>
									<p>Date</p>
								</div>
								<p class='card-text'>
									Some quick example text to build on the card title and make up
									the bulk of the card's content.
								</p>
								<a href='#' class='btn btn-block text-white'>
									See Offer
								</a>
							</div>
						</div>
						<div class='card'>
							<img
								class='card-img-top'
								src='/assets/img/img-work.jpg'
								alt='Card image cap'></img>
							<div class='card-body'>
								<div class='card-title'>
									<div className='d-flex justify-content-end'>
										<p>Rate Average</p>
									</div>
									<h4>
										<b>Offer Title</b>
									</h4>
									<p>Date</p>
								</div>
								<p class='card-text'>
									Some quick example text to build on the card title and make up
									the bulk of the card's content.
								</p>
								<a href='#' class='btn btn-block text-white'>
									See Offer
								</a>
							</div>
						</div>
						<div class='card'>
							<img
								class='card-img-top'
								src='https://mdbootstrap.com/img/Photos/Others/images/43.jpg'
								alt='Card image cap'></img>
							<div class='card-body'>
								<div class='card-title'>
									<div className='d-flex justify-content-end'>
										<p>Rate Average</p>
									</div>
									<h4>
										<b>Offer Title</b>
									</h4>
									<p>Date</p>
								</div>
								<p class='card-text'>
									Some quick example text to build on the card title and make up
									the bulk of the card's content.
								</p>
								<a href='#' class='btn btn-block text-white'>
									See Offer
								</a>
							</div>
						</div>
					</div>
					<div className='icon-more text-center '>
						<a href='#'>
							<MdAddBox />
						</a>
					</div>
				</div>
			</div>
		</div>
	);
}
