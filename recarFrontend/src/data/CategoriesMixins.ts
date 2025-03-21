const CategoriesMixins = {
    data() {
        return {
            categories: [
                {
                    src: '../src/assets/logos/bmw.png',
                    alt: 'bmw',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'bmw'
                        },
                        query: {page: 1}
                    }
                },
                {
                    src: '../src/assets/logos/audi.png',
                    alt: 'audi',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'audi'
                        },
                        query: {page: 1}
                    }
                },
                {
                    src: '../src/assets/logos/mercedes.png',
                    alt: 'mercedes',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'mercedes-benz'
                        },
                        query: {page: 1}
                    }
                },
                {
                    src: '../src/assets/logos/porsche.png',
                    alt: 'porsche',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'porsche'
                        },
                        query: {page: 1}
                    }
                },
                {
                    src: '../src/assets/logos/hyundai.png',
                    alt: 'hyundai',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'hyundai'
                        },
                        query: {page: 1}
                    }
                },
                {
                    src: '../src/assets/logos/honda.png',
                    alt: 'honda',
                    link: {
                        name: 'catalog',
                        params: {
                            brand: 'honda'
                        },
                        query: {page: 1}
                    }
                }
            ]
        }
    }
}

export default CategoriesMixins