function capitalizeBrand (brand: string) : string {
    switch (brand) {
        case 'bmw': return 'BMW'
        case 'mercedes-benz': return 'Mercedes-Benz'
        case 'land rover': return 'Land Rover'
        default: return brand.charAt(0).toUpperCase() + brand.slice(1)
    }
}

export { capitalizeBrand }