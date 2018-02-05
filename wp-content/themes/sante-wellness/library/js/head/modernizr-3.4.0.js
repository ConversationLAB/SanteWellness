/*! modernizr 3.4.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-forcetouch-svg-touchevents-domprefixes-hasevent-prefixes-setclasses-testallprops-testprop-teststyles !*/
!function (e, t, n) { function r(e, t) { return typeof e === t } function o() { var e, t, n, o, i, s, a; for (var u in _) if (_.hasOwnProperty(u)) { if (e = [], t = _[u], t.name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length)) for (n = 0; n < t.options.aliases.length; n++)e.push(t.options.aliases[n].toLowerCase()); for (o = r(t.fn, "function") ? t.fn() : t.fn, i = 0; i < e.length; i++)s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = o : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = o), C.push((o ? "" : "no-") + a.join("-")) } } function i(e) { var t = x.className, n = Modernizr._config.classPrefix || ""; if (T && (t = t.baseVal), Modernizr._config.enableJSClass) { var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)"); t = t.replace(r, "$1" + n + "js$2") } Modernizr._config.enableClasses && (t += " " + n + e.join(" " + n), T ? x.className.baseVal = t : x.className = t) } function s() { return "function" != typeof t.createElement ? t.createElement(arguments[0]) : T ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments) } function a(e, t) { return !!~("" + e).indexOf(t) } function u(e) { return e.replace(/([a-z])-([a-z])/g, function (e, t, n) { return t + n.toUpperCase() }).replace(/^-/, "") } function l() { var e = t.body; return e || (e = s(T ? "svg" : "body"), e.fake = !0), e } function f(e, n, r, o) { var i, a, u, f, c = "modernizr", p = s("div"), d = l(); if (parseInt(r, 10)) for (; r--;)u = s("div"), u.id = o ? o[r] : c + (r + 1), p.appendChild(u); return i = s("style"), i.type = "text/css", i.id = "s" + c, (d.fake ? d : p).appendChild(i), d.appendChild(p), i.styleSheet ? i.styleSheet.cssText = e : i.appendChild(t.createTextNode(e)), p.id = c, d.fake && (d.style.background = "", d.style.overflow = "hidden", f = x.style.overflow, x.style.overflow = "hidden", x.appendChild(d)), a = n(p, e), d.fake ? (d.parentNode.removeChild(d), x.style.overflow = f, x.offsetHeight) : p.parentNode.removeChild(p), !!a } function c(e, t) { return function () { return e.apply(t, arguments) } } function p(e, t, n) { var o; for (var i in e) if (e[i] in t) return n === !1 ? e[i] : (o = t[e[i]], r(o, "function") ? c(o, n || t) : o); return !1 } function d(e) { return e.replace(/([A-Z])/g, function (e, t) { return "-" + t.toLowerCase() }).replace(/^ms-/, "-ms-") } function m(t, n, r) { var o; if ("getComputedStyle" in e) { o = getComputedStyle.call(e, t, n); var i = e.console; if (null !== o) r && (o = o.getPropertyValue(r)); else if (i) { var s = i.error ? "error" : "log"; i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate") } } else o = !n && t.currentStyle && t.currentStyle[r]; return o } function v(t, r) { var o = t.length; if ("CSS" in e && "supports" in e.CSS) { for (; o--;)if (e.CSS.supports(d(t[o]), r)) return !0; return !1 } if ("CSSSupportsRule" in e) { for (var i = []; o--;)i.push("(" + d(t[o]) + ":" + r + ")"); return i = i.join(" or "), f("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) { return "absolute" == m(e, null, "position") }) } return n } function h(e, t, o, i) { function l() { c && (delete A.style, delete A.modElem) } if (i = r(i, "undefined") ? !1 : i, !r(o, "undefined")) { var f = v(e, o); if (!r(f, "undefined")) return f } for (var c, p, d, m, h, g = ["modernizr", "tspan", "samp"]; !A.style && g.length;)c = !0, A.modElem = s(g.shift()), A.style = A.modElem.style; for (d = e.length, p = 0; d > p; p++)if (m = e[p], h = A.style[m], a(m, "-") && (m = u(m)), A.style[m] !== n) { if (i || r(o, "undefined")) return l(), "pfx" == t ? m : !0; try { A.style[m] = o } catch (y) { } if (A.style[m] != h) return l(), "pfx" == t ? m : !0 } return l(), !1 } function g(e, t, n, o, i) { var s = e.charAt(0).toUpperCase() + e.slice(1), a = (e + " " + N.join(s + " ") + s).split(" "); return r(t, "string") || r(t, "undefined") ? h(a, t, o, i) : (a = (e + " " + b.join(s + " ") + s).split(" "), p(a, t, n)) } function y(e, t, r) { return g(e, n, n, t, r) } var C = [], _ = [], S = { _version: "3.4.0", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function (e, t) { var n = this; setTimeout(function () { t(n[e]) }, 0) }, addTest: function (e, t, n) { _.push({ name: e, fn: t, options: n }) }, addAsyncTest: function (e) { _.push({ name: null, fn: e }) } }, Modernizr = function () { }; Modernizr.prototype = S, Modernizr = new Modernizr, Modernizr.addTest("svg", !!t.createElementNS && !!t.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect); var w = S._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""]; S._prefixes = w; var E = "Moz O ms Webkit", b = S._config.usePrefixes ? E.toLowerCase().split(" ") : []; S._domPrefixes = b; var x = t.documentElement, T = "svg" === x.nodeName.toLowerCase(), z = function () { function e(e, t) { var o; return e ? (t && "string" != typeof t || (t = s(t || "div")), e = "on" + e, o = e in t, !o && r && (t.setAttribute || (t = s("div")), t.setAttribute(e, ""), o = "function" == typeof t[e], t[e] !== n && (t[e] = n), t.removeAttribute(e)), o) : !1 } var r = !("onblur" in t.documentElement); return e }(); S.hasEvent = z; var N = S._config.usePrefixes ? E.split(" ") : []; S._cssomPrefixes = N; var O = S.testStyles = f; Modernizr.addTest("touchevents", function () { var n; if ("ontouchstart" in e || e.DocumentTouch && t instanceof DocumentTouch) n = !0; else { var r = ["@media (", w.join("touch-enabled),("), "heartz", ")", "{#modernizr{top:9px;position:absolute}}"].join(""); O(r, function (e) { n = 9 === e.offsetTop }) } return n }); var P = { elem: s("modernizr") }; Modernizr._q.push(function () { delete P.elem }); var A = { style: P.elem.style }; Modernizr._q.unshift(function () { delete A.style }); S.testProp = function (e, t, r) { return h([e], n, t, r) }; S.testAllProps = g, S.testAllProps = y; var R = function (t) { var r, o = w.length, i = e.CSSRule; if ("undefined" == typeof i) return n; if (!t) return !1; if (t = t.replace(/^@/, ""), r = t.replace(/-/g, "_").toUpperCase() + "_RULE", r in i) return "@" + t; for (var s = 0; o > s; s++) { var a = w[s], u = a.toUpperCase() + "_" + r; if (u in i) return "@-" + a.toLowerCase() + "-" + t } return !1 }; S.atRule = R; var j = S.prefixed = function (e, t, n) { return 0 === e.indexOf("@") ? R(e) : (-1 != e.indexOf("-") && (e = u(e)), t ? g(e, t, n) : g(e, "pfx")) }; Modernizr.addTest("forcetouch", function () { return z(j("mouseforcewillbegin", e, !1), e) ? MouseEvent.WEBKIT_FORCE_AT_MOUSE_DOWN && MouseEvent.WEBKIT_FORCE_AT_FORCE_MOUSE_DOWN : !1 }), o(), i(C), delete S.addTest, delete S.addAsyncTest; for (var k = 0; k < Modernizr._q.length; k++)Modernizr._q[k](); e.Modernizr = Modernizr }(window, document);