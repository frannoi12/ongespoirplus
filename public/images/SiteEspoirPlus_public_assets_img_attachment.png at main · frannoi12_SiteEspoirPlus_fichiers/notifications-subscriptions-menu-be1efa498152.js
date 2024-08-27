"use strict";(globalThis.webpackChunk=globalThis.webpackChunk||[]).push([["notifications-subscriptions-menu"],{84923:(e,t,r)=>{let s;var i,n,a=r(72245),o=r(74848),l=r(96540),c=r(281),d=r(84300),u=r(59857),h=r(28784);let m=(s="/notifications/subscribe",async e=>{try{let t=await (0,h.DI)(s,{method:"POST",body:e});if(t.ok)return t;return Error("Failed to update")}catch(e){return e}});var p=r(17909),b=r(69909);!function(e){e.NONE="none",e.WATCHING="watching",e.IGNORING="ignoring",e.CUSTOM="custom"}(i||(i={}));let g={none:"Participating and @mentions",watching:"All Activity",ignoring:"Ignore",custom:"Custom"},_={...g,none:"Participating"},f={none:"Watch",watching:"Unwatch",ignoring:"Stop ignoring",custom:"Unwatch"},y=[{name:g.none,description:"Only receive notifications from this repository when participating or @mentioned.",subscriptionType:"none"},{name:g.watching,description:"Notified of all notifications on this repository.",subscriptionType:"watching"},{name:g.ignoring,description:"Never be notified.",subscriptionType:"ignoring"},{name:g.custom,description:"Select events you want to be notified of in addition to participating and @mentions.",trailingIcon:(0,l.createElement)(u.ArrowRightIcon),subscriptionType:"custom"}],x=e=>e in f?f[e]:"",v=(e,t)=>{let r=x(e),s=_[e];return"ignoring"===e?`${r} in ${t}`:`${r}: ${s} in ${t}`};function C(e){return(0,o.jsx)(p.l,{selectionVariant:"single",children:y.map((t,r)=>(0,o.jsxs)(l.Fragment,{children:[(0,o.jsxs)(p.l.Item,{selected:t.subscriptionType===e.selected,onSelect:()=>e.onSelect(t.subscriptionType),children:[(0,o.jsx)(b.A,{sx:{fontWeight:"bold"},children:t.name}),(0,o.jsx)(p.l.Description,{variant:"block",children:t.description}),t.trailingIcon?(0,o.jsx)(p.l.TrailingVisual,{children:t.trailingIcon}):null]}),r!==y.length-1?(0,o.jsx)(p.l.Divider,{}):""]},r))})}try{C.displayName||(C.displayName="SubscriptionList")}catch{}var j=r(66889),R=r(47553),S=r(67269),w=r(94977),N=r(55847),E=r(38553);let T={footerContainer:"FooterActions-module__footerContainer--Z9ixI",buttonsContainer:"FooterActions-module__buttonsContainer--lkkwg"};function A(e){let[t,r]=(0,l.useState)(!1),s=(0,l.useCallback)(()=>(e.nextFocusRef?.current?.focus(),!0),[e.nextFocusRef]),i=(0,l.useCallback)(()=>{r(!0)},[]),n=(0,l.useCallback)(()=>{e.onApply(),setTimeout(()=>{e?.checkStatus&&e.checkStatus(i)},600)},[e,i]);return(0,o.jsxs)("div",{className:T.footerContainer,children:[e.showError?(0,o.jsx)(b.A,{sx:{py:3,pl:3,color:"var(--fgColor-muted, var(--color-fg-muted))"},children:"Error. Please try again."}):null,(0,o.jsxs)("div",{className:T.buttonsContainer,style:e.overrideButtonStyles??{padding:"var(--base-size-16)"},children:[!e.showError&&t?(0,o.jsx)(E.A,{size:"small",sx:{mr:2}}):null,(0,o.jsx)(N.Q,{size:"small",onClick:()=>e.onCancel(),onBlur:t=>{e.disabled&&s(t)},children:"Cancel"}),(0,o.jsx)(N.Q,{disabled:e.disabled,variant:"primary",size:"small",onClick:()=>n(),onBlur:s,sx:{ml:2},children:"Apply"})]})]})}try{A.displayName||(A.displayName="FooterActions")}catch{}function k(e){let[t,r]=(0,l.useState)(!1),[s,i]=(0,l.useState)(""),n=e.items.filter(e=>e?.text?.toLowerCase().startsWith(s.toLowerCase())),a=(0,l.useCallback)(()=>{e.applyLabels(),r(!1)},[e]),c=(0,l.useCallback)(()=>{e.resetLabels(),r(!1)},[e]),d=l.memo(I);return(0,o.jsx)(o.Fragment,{children:(0,o.jsx)(S.X,{title:"Select labels",renderAnchor:t=>0===e.items.length?(0,o.jsx)(w.A,{text:"Add labels to this repository to filter on them.",direction:"s",children:(0,o.jsx)(d,{anchorProps:t,itemsLength:e.items.length,labelsText:e.labelsText})}):(0,o.jsx)(d,{anchorProps:t,itemsLength:e.items.length,labelsText:e.labelsText}),placeholderText:"Filter labels",open:t,onOpenChange:r,items:n,selected:e.selectedLabels,onSelectedChange:e.onChangeLabels,onFilterChange:i,showItemDividers:!0,overlayProps:{width:"small",height:"medium",maxHeight:"medium"},footer:(0,o.jsx)("div",{style:{width:"100%"},children:(0,o.jsx)(A,{onCancel:c,onApply:a,overrideButtonStyles:{padding:"var(--base-size-8)"}})})})})}let I=({anchorProps:e,itemsLength:t,labelsText:r})=>(0,o.jsx)(N.Q,{leadingVisual:u.TagIcon,trailingAction:u.TriangleDownIcon,...e,"aria-label":"Filter labels","aria-describedby":"select-labels","aria-haspopup":"dialog",size:"small",disabled:0===t,children:0===t?"No labels available":(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("span",{className:"color-fg-muted",children:"Labels: "}),(0,o.jsx)("span",{id:"select-labels",children:r})]})});try{k.displayName||(k.displayName="FilterLabels")}catch{}try{(n=ButtonFilter).displayName||(n.displayName="ButtonFilter")}catch{}let L=e=>{let t=F(e,2);if(e.length>=2){if(2===e.length)return O(e);let r=F(e,3);if(r.length>30)return`${t.slice(0,30)}... +${e.length-2} more`;{let t=e.length>3?` +${e.length-3} more`:"";return`${r}${t}`}}if(1!==e.length)return"All";{let t=e[0]?.text||"";return t.length>30?`${t.slice(0,30)}...`:t}},O=e=>{let t=e[0]?.text||"",r=F(e,2);return r.length>30?t.length>25?`${t.slice(0,25)}... +1 more`:`${r.slice(0,30)}...`:r},F=(e,t)=>e.slice(0,t).map(e=>e.text).join(", "),D=e=>{switch(e){case"PullRequest":return"Pull requests";case"SecurityAlert":return"Security alerts";default:return`${e}s`}},B={filterContainer:"ThreadList-module__filterContainer--eNebD",threadContent:"ThreadList-module__threadContent--Ry8II",threadRow:"ThreadList-module__threadRow--lx6FW"};function $(e){let[t,r]=(0,l.useState)(e.appliedThreads),[s,i]=(0,l.useState)(e.appliedLabels),[n,a]=(0,l.useState)(e.appliedLabels),[c,d]=(0,l.useState)(L(e.appliedLabels));(0,l.useEffect)(()=>{e.appliedLabels.length>0&&!t.includes("Issue")&&r([...t,"Issue"])},[]);let u=(0,l.useCallback)(e=>{t&&t.includes(e)?r(t.filter(t=>t!==e)):r([...t,e])},[t]),h=(0,l.useCallback)(()=>{e.applyThreads(t)},[e,t]),m=(0,l.useCallback)(e=>{a(e),d(L(e))},[]),p=(0,l.useCallback)(()=>{i(n)},[n]),g=(0,l.useCallback)(()=>{a(s),d(L(s))},[s]);return(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("div",{className:B.threadContent,children:e.subscribableThreadTypes.map((r,s)=>(0,o.jsxs)("div",{className:B.threadRow,style:s===e.subscribableThreadTypes.length-1?{}:{borderBottom:"1px solid var(--borderColor-default, var(--color-border-default))"},children:[(0,o.jsxs)(j.A,{children:[(0,o.jsx)(R.A,{checked:t.includes(r.name),onChange:()=>u(r.name)}),(0,o.jsx)(j.A.Label,{children:D(r.name)})]}),r.enabled?null:(0,o.jsxs)(b.A,{as:"p",sx:{fontSize:"12px",m:0,color:"var(--fgColor-muted)",ml:"var(--base-size-24)"},children:[D(r.name)," are not enabled for this repository"]}),(0,o.jsx)("div",{"aria-live":"polite",children:"Issue"===r.name&&e.showLabelSubscriptions&&t.includes("Issue")?(0,o.jsx)("div",{className:B.filterContainer,children:(0,o.jsx)(k,{filterAction:h,items:e.repoLabels,labelsText:c,onChangeLabels:m,selectedLabels:n,applyLabels:p,resetLabels:g})}):null})]},s))}),(0,o.jsx)(A,{onCancel:e.cancelMenuCallback,onApply:()=>e.saveThreads(t,n),showError:e.showError,disabled:0===t.length||e.isSavingThreads})]})}try{$.displayName||($.displayName="ThreadList")}catch{}let P={watchCounter:"NotificationsSubscriptionsMenu-module__watchCounter--nAbhU",watchButton:"NotificationsSubscriptionsMenu-module__watchButton--ifxlS"};function M({repositoryId:e,repositoryName:t,watchersCount:r,subscriptionType:s,subscribableThreadTypes:n,repositoryLabels:a,showLabelSubscriptions:h}){let p=(0,l.useMemo)(()=>a.map(e=>({id:e.id,text:e.name,selected:e.subscribed})),[a]),b=p.filter(e=>e.selected),g=(0,l.useMemo)(()=>n.map(e=>e.subscribed||"Issue"===e.name&&h&&b.length>0?e.name:null).filter(e=>null!==e),[n,h,b]),[_,f]=(0,l.useState)(!1),[y,j]=(0,l.useState)(!1),[R,S]=(0,l.useState)(g.length>0?i.CUSTOM:s),[w,N]=(0,l.useState)(R),[E,T]=(0,l.useState)(g),[A,k]=(0,l.useState)(b),[I,L]=(0,l.useState)(!1),O=(0,l.createRef)(),F=(0,l.useCallback)(()=>{j(!1),S(w)},[w]),D=(0,l.useCallback)(async(t,r)=>{L(!0),T(t),k(r),N(i.CUSTOM);let s=new FormData;s.set("do","custom"),s.set("repository_id",e),t.map(e=>{s.append("thread_types[]",e)}),r.map(e=>{e.id&&s.append("labels[]",e.id.toString())}),(await m(s)).ok?(j(!1),L(!1)):f(!0)},[e]),B=(0,l.useCallback)(async t=>{let r=new FormData;t===i.IGNORING?r.set("do","ignore"):t===i.WATCHING?r.set("do","subscribed"):(t===i.NONE||t===i.CUSTOM&&0===E.length)&&r.set("do","included"),r.append("thread_types[]",""),r.set("repository_id",e),await m(r)},[e,E]),M=(0,l.useCallback)(e=>{e===i.CUSTOM?(j(!0),S(i.CUSTOM)):(S(e),N(e),B(e),T([]))},[S]),G=(0,l.useCallback)(e=>{T(e)},[T]),W=(0,l.useMemo)(()=>v(R,t),[R,t]);return(0,o.jsxs)(o.Fragment,{children:[(0,o.jsx)("div",{className:"d-md-none",children:(0,o.jsxs)(c.W,{children:[(0,o.jsx)(c.W.Button,{"data-testid":"notifications-subscriptions-menu-button-desktop",leadingVisual:R===i.IGNORING?u.BellSlashIcon:u.EyeIcon,trailingAction:null,className:P.watchButton,"aria-label":W,children:(0,o.jsx)(o.Fragment,{})}),(0,o.jsx)(c.W.Overlay,{width:"medium",children:(0,o.jsx)(C,{selected:R,onSelect:M})})]})}),(0,o.jsx)("div",{className:"d-none d-md-block",children:(0,o.jsxs)(c.W,{children:[(0,o.jsxs)(c.W.Button,{"data-testid":"notifications-subscriptions-menu-button-mobile",size:"small",leadingVisual:R===i.IGNORING?u.BellSlashIcon:u.EyeIcon,sx:{'&& [data-component="leadingVisual"]':{color:"var(--fgColor-muted, var(--color-fg-muted))"}},"aria-label":W,children:[x(R),(0,o.jsx)("span",{className:`ml-2 Counter rounded-3 ${P.watchCounter}`,children:r})]}),(0,o.jsx)(c.W.Overlay,{width:"medium",children:(0,o.jsx)(C,{selected:R,onSelect:M})})]})}),(0,o.jsx)(d.A,{returnFocusRef:O,isOpen:y,onDismiss:()=>F(),"aria-labelledby":"header",children:(0,o.jsxs)("div",{"data-testid":"inner",children:[(0,o.jsxs)(d.A.Header,{id:"header",children:["Subscribe to events for ",t]}),(0,o.jsx)($,{subscribableThreadTypes:n,showLabelSubscriptions:h,cancelMenuCallback:F,appliedThreads:E,repoLabels:p,subscribedThreads:g,applyThreads:G,appliedLabels:A,saveThreads:D,showError:_,isSavingThreads:I})]})})]})}try{M.displayName||(M.displayName="NotificationsSubscriptionsMenu")}catch{}(0,a.k)("notifications-subscriptions-menu",{Component:M})},92536:(e,t,r)=>{r.d(t,{R:()=>DeferredRegistry});let DeferredRegistry=class DeferredRegistry{register(e,t){let r=this.registrationEntries[e];r?r.resolve?.(t):this.registrationEntries[e]={promise:Promise.resolve(t)}}getRegistration(e){var t;return(t=this.registrationEntries)[e]||(t[e]=new s),this.registrationEntries[e].promise}constructor(){this.registrationEntries={}}};let s=class Deferred{constructor(){this.promise=new Promise(e=>{this.resolve=e})}}},75014:(e,t,r)=>{r.d(t,{Mm:()=>n,QJ:()=>a,w8:()=>i});var s=r(96540);function i(e){return((0,s.useEffect)(()=>{let t=e?.anchor;t&&("disabled"in t&&(t.disabled=!1),t.classList.remove("cursor-wait"))},[e]),e)?{reactPartialAnchor:{__wrapperElement:e}}:{}}function n(e){let t=(0,s.useRef)(e.__wrapperElement.anchor||null),[r,i]=(0,s.useState)(!1),n=(0,s.useCallback)(()=>{i(!r)},[r,i]);return(0,s.useEffect)(()=>{t.current&&(t.current.setAttribute("aria-expanded",r.toString()),t.current.setAttribute("aria-haspopup","true"))},[t,r]),a(e,n),{ref:t,open:r,setOpen:i}}function a(e,t){let r=(0,s.useRef)(e.__wrapperElement.anchor);(0,s.useEffect)(()=>{let e=r.current;if(e)return e.addEventListener("click",t),()=>e.removeEventListener("click",t)},[r,t])}},72245:(e,t,r)=>{r.d(t,{k:()=>c});let s=new(r(92536)).R;var i=r(74848),n=r(39595),a=r(24508),o=r(23235);let l=class ReactPartialElement extends a.H{async getReactNode(e){var t;let{Component:r}=await (t=this.name,s.getRegistration(t)),n=this.closest("react-partial-anchor");return(0,i.jsx)(o.c,{partialName:this.name,embeddedData:e,Component:r,wasServerRendered:this.hasSSRContent,ssrError:this.ssrError,anchorElement:n})}constructor(...e){super(...e),this.nameAttribute="partial-name"}};function c(e,t){s.register(e,t)}l=function(e,t,r,s){var i,n=arguments.length,a=n<3?t:null===s?s=Object.getOwnPropertyDescriptor(t,r):s;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)a=Reflect.decorate(e,t,r,s);else for(var o=e.length-1;o>=0;o--)(i=e[o])&&(a=(n<3?i(a):n>3?i(t,r,a):i(t,r))||a);return n>3&&a&&Object.defineProperty(t,r,a),a}([n.p_],l)},23581:(e,t,r)=>{r.d(t,{A:()=>o});let{getItem:s,setItem:i,removeItem:n}=(0,r(74572).A)("localStorage"),a="REACT_PROFILING_ENABLED",o={enable:()=>i(a,"true"),disable:()=>n(a),isEnabled:()=>!!s(a)}},28784:(e,t,r)=>{function s(e,t={}){!function(e){if(new URL(e,window.location.origin).origin!==window.location.origin)throw Error("Can not make cross-origin requests from verifiedFetch")}(e);let r={...t.headers,"GitHub-Verified-Fetch":"true","X-Requested-With":"XMLHttpRequest"};return fetch(e,{...t,headers:r})}function i(e,t){let r={...t?.headers??{},Accept:"application/json","Content-Type":"application/json"},i=t?.body?JSON.stringify(t.body):void 0;return s(e,{...t,body:i,headers:r})}function n(e,t={}){let r={...t.headers,"GitHub-Is-React":"true"};return s(e,{...t,headers:r})}function a(e,t){let r={...t?.headers??{},"GitHub-Is-React":"true"};return i(e,{...t,headers:r})}r.d(t,{DI:()=>s,QJ:()=>n,Sr:()=>a,lS:()=>i})},23235:(e,t,r)=>{r.d(t,{c:()=>p});var s=r(74848),i=r(96540),n=r(36165),a=r(45588),o=r(49107),l=r(47767),c=r(59840);function d({children:e,history:t}){let[r,n]=(0,i.useState)({location:t.location});return(0,c.m)(()=>t.listen(n),[t]),(0,s.jsx)(l.Ix,{location:r.location,navigator:t,children:e})}try{d.displayName||(d.displayName="PartialRouter")}catch{}var u=r(17857),h=r(51261),m=r(75014);function p({partialName:e,embeddedData:t,Component:r,wasServerRendered:l,ssrError:c,anchorElement:p}){let b=i.useRef(),g=globalThis.window;b.current||(b.current=g?(0,h.z)({window:g}):(0,a.sC)({initialEntries:[{pathname:"/"}]}));let _=b.current,f=(0,m.w8)(p);return(0,s.jsx)(n.U,{appName:e,wasServerRendered:l,children:(0,s.jsx)(o.Q,{history:_,routes:[],children:(0,s.jsxs)(d,{history:_,children:[(0,s.jsx)(r,{...t.props,...f}),(0,s.jsx)(u.h,{ssrError:c})]})})})}try{p.displayName||(p.displayName="PartialEntry")}catch{}},24508:(e,t,r)=>{r.d(t,{H:()=>ReactBaseElement});var s=r(74848),i=r(39595),n=r(5338),a=r(96540),o=r(23581),l=r(79461),c=r(51528);function d(e,t,r,s){var i,n=arguments.length,a=n<3?t:null===s?s=Object.getOwnPropertyDescriptor(t,r):s;if("object"==typeof Reflect&&"function"==typeof Reflect.decorate)a=Reflect.decorate(e,t,r,s);else for(var o=e.length-1;o>=0;o--)(i=e[o])&&(a=(n<3?i(a):n>3?i(t,r,a):i(t,r))||a);return n>3&&a&&Object.defineProperty(t,r,a),a}let u=RegExp("Minified React error #(?<invariant>\\d+)");let ReactBaseElement=class ReactBaseElement extends HTMLElement{get name(){return this.getAttribute(this.nameAttribute)}get embeddedDataText(){let e=this.embeddedData?.textContent;if(!e)throw Error(`No embedded data provided for react element ${this.name}`);return e}get hasSSRContent(){return"true"===this.getAttribute("data-ssr")}connectedCallback(){this.renderReact()}disconnectedCallback(){this.root?.unmount(),this.root=void 0}async renderReact(){if(!this.reactRoot)throw Error("No react root provided");let e={createRoot:n.H,hydrateRoot:n.c};o.A.isEnabled()&&(e=await this.getReactDomWithProfiling());let t=JSON.parse(this.embeddedDataText),r=this.ssrError?.textContent,i=await this.getReactNode(t),l=(0,s.jsx)(a.StrictMode,{children:i});if(r&&this.logSSRError(r),this.hasSSRContent){let t=this.querySelector('style[data-styled="true"]');t&&document.head.appendChild(t),this.root=e.hydrateRoot(this.reactRoot,l,{onRecoverableError:e=>{if(!(e instanceof Error))return;let t=u.exec(e.message),r=String(t?.groups?.invariant);(0,c.i)({incrementKey:"REACT_HYDRATION_ERROR",incrementTags:{appName:this.name,invariant:r}})}}),t&&requestIdleCallback(()=>{t.parentElement?.removeChild(t)})}else this.root=e.createRoot(this.reactRoot),this.root.render(l);this.classList.add("loaded")}getReactDomWithProfiling(){return r.e("react-profiling").then(r.t.bind(r,87335,19))}logSSRError(e){if(l.z[e])return console.error("SSR failed with an expected error:",l.z[e]);try{let t=JSON.parse(e),r=function(e){if(!e.stacktrace)return"";let t="\n ";return e.stacktrace.map(e=>{let{function:r,filename:s,lineno:i,colno:n}=e,a=`${t} at ${r} (${s}:${i}:${n})`;return t=" ",a}).join("\n")}(t);console.error("Error During Alloy SSR:",`${t.type}: ${t.value}
`,t,r)}catch{console.error("Error During Alloy SSR:",e,"unable to parse as json")}}};d([i.aC],ReactBaseElement.prototype,"embeddedData",void 0),d([i.aC],ReactBaseElement.prototype,"ssrError",void 0),d([i.aC],ReactBaseElement.prototype,"reactRoot",void 0);try{u.displayName||(u.displayName="REACT_INVARIANT_ERROR_REGEX")}catch{}}},e=>{var t=t=>e(e.s=t);e.O(0,["react-lib","vendors-node_modules_github_mini-throttle_dist_index_js-node_modules_primer_octicons-react_di-b40d97","vendors-node_modules_primer_react_lib-esm_Box_Box_js","vendors-node_modules_primer_react_lib-esm_Button_Button_js","vendors-node_modules_primer_react_lib-esm_TooltipV2_Tooltip_js","vendors-node_modules_clsx_dist_clsx_m_js-node_modules_primer_react_node_modules_primer_octico-c56103","vendors-node_modules_primer_react_lib-esm_ActionList_index_js","vendors-node_modules_primer_react_lib-esm_ActionMenu_ActionMenu_js-node_modules_primer_react_-5b2420","vendors-node_modules_primer_react_lib-esm_Text_Text_js-node_modules_primer_react_lib-esm_Text-7845da","vendors-node_modules_primer_react_lib-esm_FormControl_FormControl_js","vendors-node_modules_primer_react_lib-esm_FilteredActionList_FilteredActionList_js","vendors-node_modules_primer_react_lib-esm_Dialog_js-node_modules_primer_react_lib-esm_Feature-cdf735","ui_packages_react-core_create-browser-history_ts-ui_packages_safe-storage_safe-storage_ts-ui_-682c2c"],()=>t(84923)),e.O()}]);
//# sourceMappingURL=notifications-subscriptions-menu-b4eb25b180be.js.map