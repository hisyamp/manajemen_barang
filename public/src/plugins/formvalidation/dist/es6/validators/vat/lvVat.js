import t from"../../utils/isValidDate";export default function e(e){let r=e;if(/^LV[0-9]{11}$/.test(r)){r=r.substr(2)}if(!/^[0-9]{11}$/.test(r)){return{meta:{},valid:false}}const s=parseInt(r.charAt(0),10);const a=r.length;let n=0;let l=[];let i;if(s>3){n=0;l=[9,1,4,8,3,10,2,5,7,6,1];for(i=0;i<a;i++){n+=parseInt(r.charAt(i),10)*l[i]}n=n%11;return{meta:{},valid:n===3}}else{const e=parseInt(r.substr(0,2),10);const s=parseInt(r.substr(2,2),10);let f=parseInt(r.substr(4,2),10);f=f+1800+parseInt(r.charAt(6),10)*100;if(!t(f,s,e)){return{meta:{},valid:false}}n=0;l=[10,5,8,4,2,1,6,3,7,9];for(i=0;i<a-1;i++){n+=parseInt(r.charAt(i),10)*l[i]}n=(n+1)%11%10;return{meta:{},valid:`${n}`===r.charAt(a-1)}}}