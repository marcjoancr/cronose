import React from 'react';

export default function WorkCard(props) {
	const work = props.work;
	console.log(work);

	return (
		<article className='card work-card'>
			<section className='info row'>
				<figure className='col-lg-4'>
					<img
						class='card-img'
						src='https://mdbootstrap.com/img/Photos/Others/images/43.jpg'
						alt='Card image cap'></img>
				</figure>
				<div className='col-lg-8'>
					<section className='header card-header row'>
						<p className='schedule col-6 text-muted'>HORARIO</p>
						<div className='valuation col-6 text-right'>VALORACIONES</div>
					</section>
					<div className='card-body'>
						<h4>
							<b>TITULO</b>
						</h4>
						<hr></hr>
						<p class='card-text'>
							Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta
							liberavisse ea quo, te vel vidit mollis complectitur.
						</p>
						<section className='text-right'>
							<p className='price d-inline'>
								<b>PRECIO</b>
							</p>

							<a href='#' class='btn text-white'>
								See Offer
							</a>
						</section>
					</div>
				</div>
			</section>
		</article>
	);
}
