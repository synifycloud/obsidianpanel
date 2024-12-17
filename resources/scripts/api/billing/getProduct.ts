import http from '@/api/http';

export interface Product {
    name: string;
    description: string;
    price: string;
    icon: string;
}

export default (product: string): Promise<Product> => {
    return new Promise((resolve, reject) => {
        http.get(`/api/client/billing/products/${product}`)
            .then(({ data: { attributes } }) =>
                resolve({
                    name: attributes.name,
                    description: attributes.description,
                    price: attributes.price,
                    icon: attributes.icon,
                })
            )
            .catch(reject);
    });
};
