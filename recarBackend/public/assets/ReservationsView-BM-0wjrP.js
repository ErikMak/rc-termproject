import{d as h,T as k,k as C,j as b,_ as U,e as d,h as o,a as s,F as _,l as x,r as a,o as n,c,w as t,f as r}from"./index-DYY0pvwk.js";const R=h({name:"CarView",components:{TitleComponent:k},methods:{...C(["uploadAllUserReservations"])},computed:{...b(["getUserReservations","getUserID"])},created(){const i=this.getUserID;this.uploadAllUserReservations(i)}}),y={class:"reservation-grid"},B={id:"link",class:"me-2"},D={class:"link-b font-weight-medium"},T={id:"link",class:"me-2"},V={class:"link-b font-weight-medium"};function $(i,A,E,F,L,j){const m=a("TitleComponent"),l=a("router-link"),p=a("v-badge"),u=a("v-img"),v=a("v-avatar"),f=a("v-card");return n(),d(_,null,[o(m,{title:"Бронь"}),s("div",y,[(n(!0),d(_,null,x(i.getUserReservations,(e,g)=>(n(),c(f,{id:g,class:"mx-auto w-100",flat:"",color:"#f5f5f5"},{title:t(()=>[e.is_active?(n(),c(p,{key:0,color:"green",inline:"",style:{"margin-left":"-4px"}},{default:t(()=>[o(l,{to:{name:"car",params:{brand:e.brand.toLowerCase(),slug:e.model_id}},class:"pa-0"},{default:t(()=>[s("div",B,[s("p",D,r(e.car_name),1)])]),_:2},1032,["to"])]),_:2},1024)):(n(),c(l,{key:1,to:{name:"car",params:{brand:e.brand.toLowerCase(),slug:e.model_id}},class:"pa-0"},{default:t(()=>[s("div",T,[s("p",V,r(e.car_name),1)])]),_:2},1032,["to"]))]),prepend:t(()=>[o(v,{class:"me-3"},{default:t(()=>[o(u,{src:"../../src/assets/car-icon.jpg"})]),_:1})]),subtitle:t(()=>[s("p",null,"с "+r(e.date_issue)+" по "+r(e.date_return),1)]),_:2},1032,["id"]))),256))])],64)}const N=U(R,[["render",$]]);export{N as default};