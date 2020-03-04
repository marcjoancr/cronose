import React, { Component } from 'react';
import WorkCard from './WorkCard';
import Axios from 'axios';

export default class MyWorks extends Component {
	constructor(props) {
		super(props);
		this.state = { works: [{ title: 'Sample Work Title' }] };
		this.getWorks = this.getWorks.bind(this);
	}

	componentDidMount() {
		this.getWorks();
	}

	getWorks() {
		Axios.get(`${process.env.REACT_APP_API_URL}/works`).then((response) =>
			this.setState({ works: response.data || this.state.works })
		);
	}

	render() {
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
					{this.state.works.map((work, index) => (
						<WorkCard
							key={index}
							work={work}
							translations={work.translations}
						/>
					))}
				</section>
				<div className='text-center'>
					<a href='/newoffer' class='btn btn-lg mb-4'>
						NEW OFFER
					</a>
				</div>
			</>
		);
	}
}
