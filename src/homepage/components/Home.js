import React, { Component } from 'react';
import AboutUs from './AboutUs';
import LanguagePicker from './LanguagePicker';
import Translate from '../../translations/Translate';
import HowItWorks from './HowItWorks';
import Contact from './Contact';

class Home extends Component {
	render() {
		return (
			<div>
				<LanguagePicker changeLanguage={this.props.changeLanguage} />
				<div className='container mt-5 pt-4 text-center'>
					<h1>
						<Translate string={'share-time'} />
					</h1>
					<p>
						Lorem Ipsum is simply dummy text of the printing and typesetting
						industry. Lorem Ipsum has been the industry's standard dummy text
						ever since the 1500s, when an unknown printer took a galley of type
						and scrambled it to make a type specimen book.
					</p>
					<a href='/market'>
						<input
							type='button'
							className='btn btn-orange'
							value='See Our Market'></input>
					</a>
				</div>
				<HowItWorks />
				<AboutUs />
				<Contact />
			</div>
		);
	}
}

export default Home;

// export default function Home() {
// 	return (
// 		<>
// 			<div>
// 				<h1>
// 					<Translate string={'title-page'} />
// 				</h1>
// 				Hola
// 				<LanguagePicker changeLanguage={this.props.changeLanguage} />
// 				<AboutUs />
// 			</div>
// 			{/* <div className='container mt-5 pt-4 text-center'>
// 				<h1>Share Your Time</h1>
// 				<p>
// 					Lorem Ipsum is simply dummy text of the printing and typesetting
// 					industry. Lorem Ipsum has been the industry's standard dummy text ever
// 					since the 1500s, when an unknown printer took a galley of type and
// 					scrambled it to make a type specimen book.
// 				</p>
// 				<a href='/market'>
// 					<input
// 						type='button'
// 						className='btn btn-orange'
// 						value='See Our Market'></input>
// 				</a>
// 			</div>
// 			<HowItWorks />
// 			<AboutUs />
// 			<Contact /> */}
// 		</>
// 	);
// }
