import{d as F,T as b,B as _,t as B,j as D,_ as $,e as p,h as o,a as c,F as u,l as y,r as a,o as i,c as T,w as s,f as V}from"./index-CTK1YC_o.js";const E=F({name:"CarView",components:{TitleComponent:b},data:()=>({favorites:[]}),methods:{deleteFromFavorites(e){const n=e.toString(),l=this.favorites.at(e).car.model_id;_.deleteFromFavorites({favorite_id:l},d=>{var r;B.info(d.data),(r=document.getElementById(n))==null||r.remove()})}},computed:{...D(["getUserID"])},created(){const e=this.getUserID;_.getFavorites({user:e},n=>{this.favorites=n.data})}}),I={class:"favorites-grid"},j={id:"link"},w={class:"link-b font-weight-medium"};function x(e,n,l,d,r,L){const v=a("TitleComponent"),f=a("router-link"),g=a("v-img"),h=a("v-avatar"),k=a("v-btn"),C=a("v-card");return i(),p(u,null,[o(v,{title:"Избранное",class:"mb-3"}),c("div",I,[(i(!0),p(u,null,y(e.favorites,(t,m)=>(i(),T(C,{id:m,class:"mx-auto w-100",subtitle:t.car.category+"; "+t.car.type,flat:"",color:"#f5f5f5"},{title:s(()=>[o(f,{to:{name:"car",params:{brand:t.car.brand.toLowerCase(),slug:t.car.model_id}},class:"pa-0"},{default:s(()=>[c("div",j,[c("p",w,V(t.car.brand+" "+t.car.name),1)])]),_:2},1032,["to"])]),prepend:s(()=>[o(h,{class:"me-3"},{default:s(()=>[o(g,{src:"../../src/assets/car-icon.jpg"})]),_:1})]),append:s(()=>[o(k,{color:"red-darken-1",icon:"fa-solid fa-trash-can",size:"small",variant:"tonal",onClick:N=>e.deleteFromFavorites(m)},null,8,["onClick"])]),_:2},1032,["id","subtitle"]))),256))])],64)}const U=$(E,[["render",x]]);export{U as default};
