import React, { useState } from 'react';
import PageContentBlock from '@/components/elements/PageContentBlock';
import ProductRow from './ProductRow';
import { Product } from '@/api/billing/getProduct';
import getProducts from '@/api/billing/getProducts';
import useSWR from 'swr';
import { PaginatedResult } from '@/api/http';
import { useLocation } from 'react-router';

export default () => {
    const products = [
        {
            name: 'Minecraft',
            description: 'Minecraft Game Server',
            price: '5.00',
            icon: 'fas fa-cube',
        },
        {
            name: 'Rust',
            description: 'Rust Game Server',
            price: '10.00',
            icon: 'fas fa-cube',
        },
    ];

    const { search } = useLocation();
    const defaultPage = Number(new URLSearchParams(search).get('page') || '1');

    const [page, setPage] = useState(!isNaN(defaultPage) && defaultPage > 0 ? defaultPage : 1);

    const { data, error } = useSWR<PaginatedResult<Product>>(['/api/client/billing/products', page], () =>
        getProducts({ page })
    );

    return (
        <PageContentBlock title={'Billing'} showFlashKey={'billing'}>
            {products.map((product) => (
                <ProductRow key={product.name} product={product} />
            ))}
        </PageContentBlock>
    );
};
