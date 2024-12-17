import React from 'react';
import PageContentBlock from '@/components/elements/PageContentBlock';
import { Product } from '@/api/billing/getProduct';

export default ({ product }: { product: Product }) => {
    return (
        <PageContentBlock title={'Billing'} showFlashKey={'billing'}>
            <div className={'flex flex-wrap'}>
                <div className={'w-full md:w-1/2 p-2'}>
                    <div className={'bg-neutral-700 rounded p-6'}>
                        <div className={'flex items-center'}>
                            <div className={'flex-shrink-0'}>
                                <i className={`fas ${product.icon} fa-2x text-neutral-200`} />
                            </div>
                            <div className={'ml-4'}>
                                <div className={'text-lg font-medium text-neutral-100'}>{product.name}</div>
                                <div className={'text-sm text-neutral-300'}>{product.description}</div>
                            </div>
                        </div>
                        <div className={'mt-6'}>
                            <div className={'text-lg font-medium text-neutral-100'}>{product.price}</div>
                        </div>
                    </div>
                </div>
            </div>
        </PageContentBlock>
    );
};
