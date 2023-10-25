import React, { PropsWithChildren, useState } from "react";
import {
    AiOutlineMenuUnfold,
    AiOutlineMenuFold,
    AiOutlineHome,
    AiOutlineUser,
} from "react-icons/ai";
import { Layout, Menu, Button, theme, MenuProps } from "antd";
import { Link } from "@inertiajs/react";

const { Header, Sider, Content } = Layout;

type MenuItem = Required<MenuProps>["items"][number];

function getItem(
    label: React.ReactNode,
    key: React.Key,
    icon?: React.ReactNode,
    children?: MenuItem[]
): MenuItem {
    return {
        key,
        icon,
        children,
        label,
    } as MenuItem;
}

const items: MenuItem[] = [
    getItem(
        <Link href={"/dashboard"} className="capitalize">
            Dashboard
        </Link>,
        "1",
        <AiOutlineHome />
    ),
    getItem(
        <Link href={"/users"} className="capitalize">
            Users
        </Link>,
        "2",
        <AiOutlineUser />
    ),
];

const ExampleSidebar = ({ children }: PropsWithChildren) => {
    const [collapsed, setCollapsed] = useState(false);
    const {
        token: { colorBgContainer },
    } = theme.useToken();

    return (
        <Layout hasSider>
            <Sider
                trigger={null}
                collapsible
                collapsed={collapsed}
                onCollapse={() => setCollapsed(!collapsed)}
            >
                <div
                    style={{
                        height: 32,
                        margin: 16,
                        background: "rgba(255, 255, 255, 0.2)",
                    }}
                />
                <Menu theme="dark" mode="inline" items={items} />
            </Sider>
            <Layout>
                <Header style={{ padding: 0, background: colorBgContainer }}>
                    <Button
                        type="text"
                        icon={
                            collapsed ? (
                                <AiOutlineMenuUnfold />
                            ) : (
                                <AiOutlineMenuFold />
                            )
                        }
                        onClick={() => setCollapsed(!collapsed)}
                        style={{
                            fontSize: "16px",
                            width: 64,
                            height: 64,
                        }}
                    />
                </Header>
                <Content
                    style={{
                        margin: "24px 16px",
                        padding: 24,
                        minHeight: 280,
                        background: colorBgContainer,
                    }}
                >
                    {children}
                </Content>
            </Layout>
        </Layout>
    );
};

export default ExampleSidebar;
