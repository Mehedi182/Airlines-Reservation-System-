
function round(){
document.querySelector('.flight-container').style.display='block';
document.querySelector('.form-m').style.display='block';
document.querySelector('.round').style.display='flex';
document.querySelector('.round').style.marginLeft='35%';
document.querySelector('#fw').style.display='none';
document.querySelector('#ft').textContent='Flight type - Round Way';
}

function one(){
document.querySelector('.flight-container').style.display='block';
document.querySelector('.form-m').style.display='block';
document.querySelector('.round').style.display='none';
document.querySelector('#fw').style.display='none';
document.querySelector('#ft').textContent='Flight type - One Way';
}

function card(){
	document.querySelector('.card').style.display='block';
	document.querySelector('.mobile').style.display='none';
	document.querySelector('#ps').style.display='none';
	document.querySelector('#pt').textContent='Payment type - Card';

}
function see_flights()
{

document.querySelector('.see-flights').style.display='block';
}