import React, { forwardRef } from 'react';
import { Form } from 'formik';
import styled from 'styled-components/macro';
import { breakpoint } from '@/theme';
import FlashMessageRender from '@/components/FlashMessageRender';
import tw from 'twin.macro';

type Props = React.DetailedHTMLProps<React.FormHTMLAttributes<HTMLFormElement>, HTMLFormElement> & {
    title?: string;
};

const Container = styled.div`
    ${tw`w-full h-full flex flex-col items-center justify-center`};
    ${breakpoint('sm')`
        ${tw`w-4/5 mx-auto`}
    `};

    ${breakpoint('md')`
        ${tw`p-10`}
    `};

    ${breakpoint('lg')`
        ${tw`w-full`}
        max-width: 700px;
    `};
`;

export default forwardRef<HTMLFormElement, Props>(({ title, ...props }, ref) => (
    <Container>
        <FlashMessageRender css={tw`mb-2 px-1`} />
        <Form {...props} ref={ref} css={tw`h-full`}>
            <div css={tw`flex flex-col w-full bg-white/5 shadow-lg rounded-lg p-6 sm:mx-1 items-center sm:my-auto`}>
                {title && (
                    <h2 css={tw`hidden sm:block text-3xl text-center text-neutral-100 font-medium py-4`}>{title}</h2>
                )}
                <div className='sm:flex sm:flex-row w-full my-auto'>
                    <div css={tw`flex-none select-none mb-6 md:mb-0 self-center`}>
                        <img src={'/assets/svgs/synify.svg'} css={tw`block w-48 md:w-64 md:pr-8 md:pb-12 mx-auto`} />
                    </div>
                    {title && (
                        <h2 css={tw`sm:hidden text-3xl text-center text-neutral-100 font-medium py-4 mb-6`}>{title}</h2>
                    )}
                    <div css={tw`flex-1`}>{props.children}</div>
                </div>
            </div>
        </Form>
    </Container>
));
