import React from 'react';

export default function Contact() {
	return (
		<div className='container mb-5 mt-5' id='contact'>
			<h1>Contact</h1>
			<p>
				Lorem Ipsum is simply dummy text of the printing and typesetting
				industry. Lorem Ipsum has been the industry's standard dummy text ever
				since the 1500s, when an unknown printer took a galley of type and
				scrambled it to make a type specimen book. It has survived not only five
				centuries, but also the leap into electronic typesetting, remaining
				essentially unchanged. It was popularised in the 1960s with the release
				of Letraset sheets containing Lorem Ipsum passages, and more recently
				with desktop publishing software like Aldus PageMaker including versions
				of Lorem Ipsum.
			</p>
			<div class='form-group'>
				<label for='exampleFormControlInput1'></label>
				<input
					type='email'
					class='form-control'
					id='exampleFormControlInput1'
					placeholder='Email'></input>
			</div>
			<div class='form-group'>
				<label for='exampleFormControlTextarea1'></label>
				<textarea
					class='form-control'
					id='exampleFormControlTextarea1'
					rows='3'
					placeholder='Text'></textarea>
			</div>
		</div>
	);
}
