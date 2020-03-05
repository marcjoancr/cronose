import React from 'react';
import Rater from 'react-rater';
import 'react-rater/lib/react-rater.css';

export default function WorkCard(props) {
	const work = props.work;

	return (
		<article className='card work-card'>
			<section className='info row'>
				<figure className='col-lg-3'>
					<img
						className='card-img'
						src='/assets/img/img-work.jpg'
						alt='Card image cap'></img>
				</figure>
				<div className='col-lg-9'>
					<section className='header card-header row'>
						<p className='schedule col-2 text-muted my-auto d-none d-md-block'>
							HORARIO
						</p>
						<div className='col-6 d-inline-flex'>
							<ul className='list-group list-group-horizontal list-unstyled mb-4 my-auto'>
								<li className='text-muted my-auto'>L</li>
								<li className=''>M</li>
								<li className=''>X</li>
								<li className='text-muted my-auto'>J</li>
								<li className=''>V</li>
								<li className=''>S</li>
								<li className=''>D</li>
							</ul>
							<p className='ml-4 my-auto'>
								De: <b>10:00h</b> a <b>14:00h</b>
							</p>
						</div>
						<div className='valuation col-4 text-right my-auto'>
							<Rater
								total={5}
								rating={work.valoration_avg / 10 / 2}
								interactive={false}
							/>
						</div>
					</section>
					<div className='card-body'>
						<h4>
							<b>{work.title || work.translations[0].title}</b>
						</h4>
						<small className='form-text text-muted'>{work.name}</small>
						<hr></hr>
						<p className='card-text'>
							{work.description || work.translations[0].description}
						</p>
						<section className='text-right'>
							<p className='price d-inline'>
								<b>Precio: {work.coin_price}</b>
							</p>
							<a href='/work' className='btn text-white'>
								See Offer
							</a>
						</section>
					</div>
				</div>
			</section>
		</article>
	);
}
