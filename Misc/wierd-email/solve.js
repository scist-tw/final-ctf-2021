const q = require('q-encoding')
const utf8 = require('utf8')

const encoded = 'SCIST{=E2=84=B31=E2=93=82=E2=93=94_4=E2=84=95=E1=B5=88_=E2=84=9A-=E2=92=BA=E1=B4=BA=E2=84=AD0d=E2=84=B9=EF=B8=8F=EF=BD=8E9_a=E2=93=A1e_c=E2=93=9E0=E2=84=93}'
const decoded = utf8.decode(q.decode(encoded))

console.log(decoded)
