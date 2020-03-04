import React from 'react';
import Rater from 'react-rater';
import 'react-rater/lib/react-rater.css';

export default function WorkCard(props) {
	const work = props.work;
	let translation;
	let title, description, price, rater;
	for (translation in work.translations) {
		title = work.translations[0].title;
		description = work.translations[0].description;
		price = work.coin_price;
		rater = work.valoration_avg / 10 / 2;
		break;
	}

	return (
		<article className='card my-work-card'>
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
							<Rater total={5} rating={rater} interactive={false} />
						</div>
					</section>
					<div className='card-body'>
						<h4>
							<b>{title}</b>
						</h4>
						<hr></hr>
						<p class='card-text'>{description}</p>
						<section className='text-right'>
							<p className='price d-inline'>
								<b>{price}</b>
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
