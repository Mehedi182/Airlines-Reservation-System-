function users(){
document.querySelector('.users').style.display='block';
document.querySelector('.insert').style.display='none';
document.querySelector('.payments').style.display='none';
document.querySelector('.booked-flights').style.display='none';
document.querySelector('.see-flights').style.display='none';
document.querySelector('.btnuser').style.fontsize='20px';
}
function insert(){
document.querySelector('.users').style.display='none';
document.querySelector('.see-flights').style.display='none';
document.querySelector('.payments').style.display='none';
document.querySelector('.booked-flights').style.display='none';
document.querySelector('.insert').style.display='block';
}
function see_flights()
{
document.querySelector('.users').style.display='none';
document.querySelector('.insert').style.display='none';
document.querySelector('.payments').style.display='none';
document.querySelector('.booked-flights').style.display='none';
document.querySelector('.see-flights').style.display='block';
}

function book(){
document.querySelector('.users').style.display='none';
document.querySelector('.insert').style.display='none';
document.querySelector('.see-flights').style.display='none';
document.querySelector('.payments').style.display='none';
document.querySelector('.booked-flights').style.display='block';
}

function payments(){
	document.querySelector('.users').style.display='none';
document.querySelector('.insert').style.display='none';
document.querySelector('.see-flights').style.display='none';
document.querySelector('.booked-flights').style.display='none';
document.querySelector('.payments').style.display='block';

}
