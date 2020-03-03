import React from 'react';
import Rater from 'react-rater';
import 'react-rater/lib/react-rater.css';

export default function WorkCard(props) {
	const work = props.work;
	console.log(work);

	return (
		<article className='card work-card'>
			<section className='info row'>
				<figure className='col-lg-4'>
					<img
						class='card-img'
						src='/assets/img/img-work.jpg'
						alt='Card image cap'></img>
				</figure>
				<div className='col-lg-8'>
					<section className='header card-header row'>
						<p className='schedule col-6 text-muted'>HORARIO</p>
						<div className='valuation col-6 text-right'>
							<Rater total={5} rating={3} interactive={false} />
						</div>
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

							<a href='/work' class='btn text-white'>
								See Offer
							</a>
						</section>
					</div>
				</div>
			</section>
		</article>
	);
}
