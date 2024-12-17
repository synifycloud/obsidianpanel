import http, { getPaginationSet, PaginatedResult } from '@/api/http';
import { Product } from './getProduct';

interface QueryParams {
    query?: string;
    page?: number;
}

export default ({ query, ...params }: QueryParams): Promise<PaginatedResult<Product>> => {
    return new Promise((resolve, reject) => {
        http.get('/api/client/billing/products', {
            params: {
                'filter[*]': query,
                ...params,
            },
        })
            .then(({ data }) =>
                resolve({
                    items: data.data.map((product: any) => ({
                        name: product.attributes.name,
                        description: product.attributes.description,
                        price: product.attributes.price,
                        icon: product.attributes.icon,
                    })),
                    pagination: getPaginationSet(data.meta.pagination),
                })
            )
            .catch(reject);
    });
};
