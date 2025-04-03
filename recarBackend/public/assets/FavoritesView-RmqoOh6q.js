import{d as F,T as $,J as p,z as B,_ as D,i as u,g as o,b as l,q as v,C as y,r as a,o as d,a as T,w as s,t as V}from"./index-CfCwTioh.js";const E=F({name:"CarView",components:{TitleComponent:$},data:()=>({favorites:[]}),methods:{deleteFromFavorites(t){const r=t.toString(),i=this.favorites.at(t);if(i){const m=i.car.model_id.toString();p.deleteFromFavorites({favorite_id:m},n=>{var c;this.$toastr.info(n.data),(c=document.getElementById(r))==null||c.remove()},n=>{this.$toastr.error(n)})}else this.$toastr.error("Не удалось удалить авто из избранного!")}},computed:{...B(["getUserID"])},created(){const t=this.getUserID;p.getFavorites({user:t},r=>{this.favorites=r.data})}}),I={class:"favorites-grid"},S={id:"link"},w={class:"link-b font-weight-medium"};function x(t,r,i,m,n,c){const f=a("TitleComponent"),g=a("router-link"),h=a("v-img"),C=a("v-avatar"),b=a("v-btn"),k=a("v-card");return d(),u(v,null,[o(f,{title:"Избранное",class:"mb-3"}),l("div",I,[(d(!0),u(v,null,y(t.favorites,(e,_)=>(d(),T(k,{id:_,class:"mx-auto w-100",subtitle:e.car.category+"; "+e.car.type,flat:"",color:"#f5f5f5"},{title:s(()=>[o(g,{to:{name:"car",params:{brand:e.car.brand.toLowerCase(),slug:e.car.model_id}},class:"pa-0"},{default:s(()=>[l("div",S,[l("p",w,V(e.car.brand+" "+e.car.name),1)])]),_:2},1032,["to"])]),prepend:s(()=>[o(C,{class:"me-3"},{default:s(()=>[o(h,{src:"../../src/assets/car-icon.jpg"})]),_:1})]),append:s(()=>[o(b,{color:"red-darken-1",icon:"fa-solid fa-trash-can",size:"small",variant:"tonal",onClick:z=>t.deleteFromFavorites(_)},null,8,["onClick"])]),_:2},1032,["id","subtitle"]))),256))])],64)}const N=D(E,[["render",x]]);export{N as default};
