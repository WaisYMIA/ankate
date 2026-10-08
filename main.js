(function(){var d=document;d.documentElement.classList.add('js');
var b=d.querySelector('.menu'),n=d.querySelector('.nav');
if(b&&n){b.addEventListener('click',function(){var o=n.classList.toggle('open');b.setAttribute('aria-expanded',o)});
d.addEventListener('keydown',function(e){if(e.key==='Escape'&&n.classList.contains('open')){n.classList.remove('open');b.setAttribute('aria-expanded','false');b.focus()}})}
var s=new URLSearchParams(location.search).get('status'),t=d.getElementById('status');
var m={sent:['ok','Thank you. We have received your enquiry and will reply within one business day.'],error:['err','Your message could not be sent. Please check the required fields, or email info@ankateconsulting.co.ke or call +254 705 914 714.'],subscribed:['ok','You are subscribed. Thank you.'],suberror:['err','We could not subscribe you. Please enter a valid email and tick the consent box.']};
if(t&&m[s]){t.className='banner '+m[s][0];t.textContent=m[s][1];t.hidden=false;t.setAttribute('tabindex','-1');t.focus()}
d.querySelectorAll('form[data-lock]').forEach(function(f){f.addEventListener('submit',function(){var x=f.querySelector('button[type=submit]');if(x){x.disabled=true;x.textContent='Sending...'}})})})();
