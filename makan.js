

const makanaan = (makan)=>{
  if(makan == "rumput"){
    return `Herbivora`
  }else if(makan == "daging"){
    return `Karnivira`
  }else{
    return `Omnivora`
  }
}

makanan('rumput')
