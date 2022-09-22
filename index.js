

//harga diskon
//jika 100.000 diskon 10%


const diskon = (num) => {
  const dis = 10/100 * num
  if (num >= 100000){
    const total = num - dis
    console.log(`anda medapat diskon :${dis}`)
    console.log(`total bayar anda : ${total}`)
  }else{
    console.log(`total bayar : ${num}`)
  }
}

console.log(diskon(100000))