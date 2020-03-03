import React from 'react';
import WorkCard from './WorkCard';

export default function MyWorks() {
	return (
		<>
			<div className='text-right pt-4 mr-4'>
				<a href='#' class='btn'>
					WORK HISTORY
				</a>
			</div>
			<div className='text-center pt-2'>
				<h1>My Works</h1>
			</div>
			<section className='works'>
				<WorkCard />
				<WorkCard />
				<WorkCard />
			</section>
			<div className='text-center'>
				<a href='#' class='btn btn-lg mb-4'>
					NEW OFFER
				</a>
			</div>
		</>
	);
}
