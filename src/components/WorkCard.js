import React from 'react';

export default function WorkCard(props) {
	const work = props.work;
	console.log(work);

	return (
		<article className='work-card'>
			<h3>{work.name}</h3>
			<div id="job" className="text-white card">
	<div className="row">
		<div id="imgCol"className="col-md-3 col-12">
			<img id="imgArticle" className="" src="https://i.picsum.photos/id/0/250/220.jpg" alt="Card image"/>
		</div>
		<div id="jobBody" className="col-md-9 col-12">
			<div className="row">
				<div className="col-8">
					<div className="pt-4">
						<h3 className="pt-2"><strong>TITULO</strong></h3>
					</div>
			  	<div>
					  <p className="pt-4">DESCRIPCION</p>
				  </div>
			  </div>
        <div id="barR" className="col-4">
          <div id="valJob" className="row">
            <div className="val col-6 text-center">
              <p className="align-middle">GV : <strong>AVG</strong></p>
            </div>
            <div className="val col-6 text-center">
              <p>PV : <strong>PER</strong></p>
            </div>
          </div>
          <div id="priceJob" className="align-middle">
            <h4>Precio  : <strong>PRECIO</strong></h4>
          </div>
          <div id="buttonDiv" className="text-center">
            <a id="buttonJob" href="#" type="button" className="btn pl-4 pr-4">Ver Trabajo</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
		</article>
	);
}
