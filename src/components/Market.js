import React, { Component } from 'react';
import Axios from 'axios';
import $ from 'jquery';
import {
	IoIosArrowDroprightCircle,
	IoIosArrowDropleftCircle,
} from 'react-icons/io';
import WorkCard from './WorkCard';

export default class Market extends Component {
	constructor(props) {
		super(props);
		this.state = { works: [{ title: 'Sample Work Title' }] };
		this.getWorks = this.getWorks.bind(this);
	}

	componentDidMount() {
		this.getWorks();
		$('#btn-show').click(function() {
			$('#jobFilter').show();
			$('#btn-show').hide();
		});

		$('#btn-hide').click(function() {
			$('#jobFilter').hide();
			$('#btn-show').show();
		});
	}

	getWorks() {
		Axios.get(`${process.env.REACT_APP_API_URL}/works`).then((response) =>
			this.setState({ works: response.data || this.state.works })
		);
	}

	render() {
		return (
			<>
				<div className='btn-search md-form mt-0'>
					<input
						className='form-control'
						type='text'
						placeholder='Search'
						aria-label='Search'></input>
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
				<a id='btn-show'>
					<IoIosArrowDropleftCircle />
				</a>

				<div className='' id='jobFilter'>
					<a id='btn-hide'>
						<IoIosArrowDroprightCircle />
					</a>
					<h2 className='p-3 pt-4 text-center'>Job Filter</h2>
					<div className='input-group p-2'>
						<div className='p-2 pt-4'>
							<label htmlFor='language'>Language</label>
							<br></br>
							<select className='browser-default custom-select' id='lang'>
								<option disabled selected value='null'>
									Castellano
								</option>
							</select>
						</div>
						<div className='p-2 pt-4 '>
							<label htmlFor='myLangs'>Selected Languages</label>
							<select className='rowser-default custom-select' id='myLangs'>
								<option disabled selected value='null'>
									My Langs
								</option>
							</select>
						</div>
						<div className='p-2 pt-4'>
							<label htmlFor='category'>Category</label>
							<select className='rowser-default custom-select' id='category'>
								<option disabled selected value='null'>
									My Category
								</option>
							</select>
						</div>
						<div className='p-2 pt-4'>
							<label htmlFor='specialization'>Specialization</label>
							<select
								className='rowser-default custom-select'
								id='specialization'>
								<option disabled selected value='null'>
									Specializations
								</option>
							</select>
						</div>
						<div className='p-2 pt-4'>
							<button id='btn-filter' className='btn text-white'>
								Reset Filter
							</button>
						</div>
					</div>
				</div>
			</>
		);
	}
}

function hide() {
	function handleClick(e) {
		e.preventDefault();
		console.log('The link was clicked.');
	}

	return (
		<a href='#' onClick={handleClick}>
			Click me
		</a>
	);
}
