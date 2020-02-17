import React from 'react';

export default function WorkCard(props) {
	const work = props.work;

	return (
		<article className='work-card'>
			<h3>{work.name}</h3>
		</article>
	);
}
